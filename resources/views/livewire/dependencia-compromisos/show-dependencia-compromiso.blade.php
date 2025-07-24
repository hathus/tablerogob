<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-doradoins">
            @forelse ($dependencia_compromisos as $dependencia_compromiso)
                <div
                    class="p-6 text-gray-900 dark:text-slate-200 md:flex md:justify-between border border-doradoins md:items-center">
                    <div class="mr-7">
                        {{ $dependencia_compromiso->compromiso_numero }}
                    </div>
                    <div class=" rounded-lg text-justify mr-7 select-none w-full">
                        <p class="font-bold">Compromiso:</p>
                        <p>{{ $dependencia_compromiso->compromiso->compromiso_nombre }}</p>
                        <p class="font-bold">Cabeza de Sector:</p>
                        @if ($dependencia_compromiso->compromiso->dependencia?->dependencia_nombre !== null)
                            {{--  --}}
                            - {{ $dependencia_compromiso->compromiso->dependencia?->dependencia_nombre }}
                        @else
                            <p>- Sin Cabeza de Sector</p>
                        @endif

                        <p class="font-bold">Intervinientes:</p>
                        @php
                            $nombres = collect($dependencias)
                                ->whereIn(
                                    'id',
                                    json_decode(
                                        $dependencia_compromiso->compromiso->compromiso_dependencia_intervienen,
                                    ),
                                )
                                ->pluck('dependencia_nombre') /*  */
                                ->toArray();
                        @endphp

                        @forelse ($nombres as $nombre)
                            <p class="text-justify">- {{ $nombre }}</p>
                        @empty
                            <p>- Sin Intervinientes</p>
                        @endforelse

                        <p>
                            {{ $dependencia_compromiso->presupuesto_ejercido ? 'Presupuesto Ejercido: MXN $' . number_format($dependencia_compromiso->presupuesto_ejercido, 2) : '' }}
                        </p>

                        <p>
                            @php
                                $formatter = new NumberFormatter('en_US', NumberFormatter::PERCENT);
                            @endphp
                            {{ $dependencia_compromiso->porcentaje_cumplimiento ? 'Porcentaje de Cumplimiento: ' . $formatter->format($dependencia_compromiso->porcentaje_cumplimiento / 100) : '' }}
                        </p>

                        <p>
                            {{ $dependencia_compromiso->meta_acumulada ? 'Meta Acumulada: ' . $dependencia_compromiso->meta_acumulada : '' }}
                        </p>
                        <p>
                            {{ $dependencia_compromiso->medio_verificacion ? 'Medio de Verificación: ' . $dependencia_compromiso->medio_verificacion : '' }}
                        </p>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-3 mt-5 md:mt-0 md:justify-between ">
                        <a href="{{ route('editar-avance-compromiso', $dependencia_compromiso->id) }}"
                            class="border border-verdeins py-2 px-4 rounded dark:text-slate-100 hover:bg-verdeins text-xs font-bold uppercase text-center flex items-center justify-center hover:text-white h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            Editar
                        </a>
                        <a href="{{ route('mostrar-ficha-impacto', $dependencia_compromiso->id) }}"
                            class="border border-yellow-700 py-2 px-4 rounded dark:text-slate-100 hover:bg-yellow-700 text-xs font-bold uppercase text-center flex items-center justify-center hover:text-white h-12">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            Ficha de Impacto
                        </a>
                    </div>
                </div>
            @empty
                <p class="p-3 text-center text-sm text-gray-200">
                    No existen registros en este momento.
                </p>
            @endforelse
        </div>
    </div>
</div>
