<div class="py-6 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-8">
            <!-- Box: Compromiso -->
            <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow col-span-1">
                <h2 class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Compromiso</h2>
                <p class="text-gray-900 dark:text-white">
                    {{ $dependencia_compromiso->compromiso->compromiso_nombre }}
                </p>
            </div>

            <!-- Box: Gráfica de barras -->
            <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow col-span-2 row-span-3">
                <h2 class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Presupuesto Ejercido por Año</h2>
                <div style="position: relative; height: 300px; width: 100%;">
                    <canvas id="grafica-{{ $dependencia_compromiso->id }}"
                        style="display: block; box-sizing: border-box; height: 300px; width: 100%;"></canvas>
                </div>
            </div>

            <!-- Box: Cabeza de Sector -->
            <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow col-span-1">
                <h2 class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Cabeza de Sector</h2>
                <p class="text-gray-900 dark:text-white">
                    {{ $dependencia_compromiso->compromiso->dependencia?->dependencia_nombre ?? 'Sin Cabeza de Sector' }}
                </p>
            </div>

            <!-- Box: Intervinientes -->
            <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow col-span-1">
                <h2 class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Intervinientes</h2>
                @php
                    $nombres = collect($dependencias)
                        ->whereIn(
                            'id',
                            json_decode($dependencia_compromiso->compromiso->compromiso_dependencia_intervienen),
                        )
                        ->pluck('dependencia_nombre')
                        ->toArray();
                @endphp
                @forelse ($nombres as $nombre)
                    <p class="text-gray-900 dark:text-white">- {{ $nombre }}</p>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">Sin Intervinientes</p>
                @endforelse
            </div>

            <!-- Box: Presupuesto + Porcentaje + Meta -->
            <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow col-span-3">
                <h2 class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Datos Financieros</h2>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 text-sm text-gray-900 dark:text-white">
                    <div>
                        <p class="font-medium">Presupuesto Ejercido</p>
                        <p class="text-green-600 dark:text-green-400 font-semibold">
                            {{ $dependencia_compromiso->presupuesto_ejercido ? '$' . number_format($dependencia_compromiso->presupuesto_ejercido, 2) . ' MXN' : 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="font-medium">Porcentaje de Cumplimiento</p>
                        @php
                            $cumplimiento = $dependencia_compromiso->porcentaje_cumplimiento;
                            $formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
                        @endphp
                        <p class="{{ $cumplimiento == 100 ? 'text-green-600 dark:text-green-400 font-semibold' : '' }}">
                            {{ $cumplimiento ? $formatter->format($cumplimiento / 100) : 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="font-medium">Meta Acumulada</p>
                        <p
                            class="{{ $dependencia_compromiso->meta_acumulada == 100 ? 'text-green-600 dark:text-green-400 font-semibold' : '' }}">
                            {{ $dependencia_compromiso->meta_acumulada ?? 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="font-medium">Beneficiarios</p>
                        <p class="text-gray-900 dark:text-white">
                            {{ $dependencia_compromiso->beneficiarios ? number_format($dependencia_compromiso->beneficiarios) : 'N/A' }}
                    </div>
                    <div>
                        <p class="font-medium">Unidad de Medida</p>
                        <p class="text-gray-900 dark:text-white">
                            @php
                                $unidades_medida = json_encode($dependencia_compromiso);
                                //$unidad_medidas = collect($unidad_medidas)->keyBy('id')->toArray
                                $nombres = collect($unidad_medidas)
                                    ->whereIn(
                                        'id',
                                        json_decode(
                                            //$unidades_medida ? $unidades_medida : '[]',
                                            json_encode($dependencia_compromiso->unidad_medida)
                                        ),
                                    )
                                    ->pluck('unidad_medida_singular')
                                    ->toArray();
                            @endphp
                            @forelse ($nombres as $nombre)
                                <p class="text-gray-900 dark:text-white">- {{ $nombre }}</p>
                            @empty
                                <p class="text-gray-500 dark:text-gray-400">Sin Intervinientes</p>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Chart.js y generación dinámica -->
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const yearLabels = @json($yearLabels);
        const yearMontosPresupuesto = @json($yearMontosPresupuesto);

        document.addEventListener('DOMContentLoaded', function() {
            const dataFromBlade = @json($dependencia_compromiso);
            /* dataFromBlade.forEach(item => { */
            const id = dataFromBlade.id;
            const ctx = document.getElementById(`grafica-${id}`)?.getContext('2d');

            if (!ctx) return;

            const colores = [
                '#ef4444', // rojo
                '#10b981', // Verde
                '#00aeff', // azul
                '#ffe336' // amarillo
            ];

            const colorcitos = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ];

            const bordecitos = [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(153, 102, 255)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(201, 203, 207)'
            ];

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: yearLabels,
                    datasets: [{
                        label: 'Presupuesto Ejercido',
                        data: yearMontosPresupuesto,
                        backgroundColor: colorcitos,
                        borderColor: bordecitos,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#9ca3af',
                                callback: value => value.toLocaleString()
                            }
                        },
                        x: {
                            ticks: {
                                color: '#9ca3af'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: '#374151'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: context => context.dataset.label + ': $' + context.raw
                                    .toLocaleString()
                            }
                        }
                    }
                }
            });
            /* }); */
        });
    </script>
@endpush
