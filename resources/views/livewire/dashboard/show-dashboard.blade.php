<div>
    <!-- Semáforo con selección -->
    <div x-data="{ activo: null }" class="mb-6 p-4 bg-white dark:bg-gray-800 rounded-lg">
        <div class="text-center mb-4">
            <h3 class="text-lg font-intro fonb text-gray-900 dark:text-gray-100">
                Estado actual
            </h3>
        </div>

        <!-- Botones con etiquetas -->
        <div class="flex justify-center items-center space-x-6">
            <!-- Rojo -->
            <div class="flex flex-col items-center">
                <button type="button" @mousedown.prevent @click="activo = (activo === 'rojo' ? null : 'rojo')"
                    :class="activo === 'rojo' ? 'ring-4 ring-red-500 scale-110' : ''"
                    class="w-16 h-16 rounded-full bg-red-500 hover:bg-red-600 border-4 border-red-700 shadow-lg transition-all duration-200 focus:outline-none focus:ring-transparent focus-visible:ring-transparent"
                    title="0% - Crítico">
                </button>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 mt-2">No iniciado</span>
            </div>

            <!-- Naranja -->
            <div class="flex flex-col items-center">
                <button type="button" @mousedown.prevent @click="activo = (activo === 'naranja' ? null : 'naranja')"
                    :class="activo === 'naranja' ? 'ring-4 ring-orange-500 scale-110' : ''"
                    class="w-16 h-16 rounded-full bg-orange-500 hover:bg-orange-600 border-4 border-orange-700 shadow-lg transition-all duration-200 focus:outline-none focus:ring-transparent focus-visible:ring-transparent"
                    title="1-49% - Bajo">
                </button>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 mt-2">Iniciado</span>
            </div>

            <!-- Amarillo -->
            <div class="flex flex-col items-center">
                <button type="button" @mousedown.prevent @click="activo = (activo === 'amarillo' ? null : 'amarillo')"
                    :class="activo === 'amarillo' ? 'ring-4 ring-yellow-500 scale-110' : ''"
                    class="w-16 h-16 rounded-full bg-yellow-500 hover:bg-yellow-600 border-4 border-yellow-700 shadow-lg transition-all duration-200 focus:outline-none focus:ring-transparent focus-visible:ring-transparent"
                    title="50-99% - Medio">
                </button>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 mt-2">En proceso</span>
            </div>

            <!-- Verde -->
            <div class="flex flex-col items-center">
                <button type="button" @mousedown.prevent @click="activo = (activo === 'verde' ? null : 'verde')"
                    :class="activo === 'verde' ? 'ring-4 ring-green-500 scale-110' : ''"
                    class="w-16 h-16 rounded-full bg-green-500 hover:bg-green-600 border-4 border-green-700 shadow-lg transition-all duration-200 focus:outline-none focus:ring-transparent focus-visible:ring-transparent"
                    title="100% - Óptimo">
                </button>
                <span class="text-xs font-semibold text-gray-700 dark:text-gray-300 mt-2">Concluido</span>
            </div>
        </div>
    </div>

    <!-- Layout de botones de ejes + contenido -->
    <div class="flex flex-row p-4">
        <div class="flex-col w-1/3 p-2">
            @forelse ($ejes as $eje)
                <x-primary-button class="w-full rounded p-3 uppercase mt-2"
                    wire:click="changeEje({{ $eje->sub_sector_numero }})">
                    @if ($eje->sub_sector_nombre === null)
                        Eje: {{ $eje->eje_numero }} {{ $eje->eje_nombre }}
                        @if ($eje->eje_transversal)
                            Sin cabeza de sector, todas las dependencias trabajan de forma transversal
                        @endif
                    @else
                        Eje: {{ $eje->eje_numero }} {{ $eje->eje_nombre }}
                        Subsector: {{ $eje->sub_sector_numero }} {{ $eje->sub_sector_nombre }}
                        @if ($eje->eje_transversal)
                            Sin cabeza de sector, todas las dependencias trabajan de forma transversal
                        @endif
                    @endif
                </x-primary-button>
            @empty
                <p>No existen datos para mostrar</p>
            @endforelse
        </div>

        <div class="flex-col w-2/3 p-2">
            <livewire:dashboard.content-dashboard :dependencias='$dependencias' />
        </div>
    </div>
</div>
