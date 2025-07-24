<div>
    <div x-data="{ open: false }" class="bg-white dark:bg-gray-900 py-3 shadow">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-start gap-3">
                <!-- Botón lupa a la izquierda -->
                <button @click="open = !open"
                    class="w-11 h-11 mt-1 rounded-full bg-moradoins hover:bg-[#6e348f] text-white flex items-center justify-center shadow-md focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Contenido de búsqueda sin contenedor exterior -->
                <div x-show="open" class="flex-1">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">

                        <!-- Input de búsqueda -->
                        <div class="flex-1 relative">
                            <input type="text" wire:model.live.debounce.300ms="search"
                                placeholder="Buscar compromisos..."
                                class="w-full h-11 pl-10 pr-4 text-sm text-gray-800 dark:text-gray-100 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-moradoins focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Selector de tipo -->
                        <div class="flex items-center gap-2">
                            <label class="text-sm text-gray-700 dark:text-gray-300 font-medium">Buscar en:</label>
                            <select wire:model.live="searchType"
                                class="text-sm px-3 py-2 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-moradoins">
                                <option value="all">Todo</option>
                                <option value="numero">Número</option>
                                <option value="nombre">Nombre</option>
                                <option value="dependencia">Dependencia</option>
                            </select>
                        </div>

                        <!-- Botón de limpiar -->
                        @if ($search)
                            <button wire:click="clearSearch"
                                class="flex items-center gap-1 text-sm px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Limpiar
                            </button>
                        @endif
                    </div>

                    <!-- Indicador de resultados -->
                    @if ($search)
                        <div class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                            Mostrando resultados para:
                            <span class="font-semibold text-gray-900 dark:text-white">"{{ $search }}"</span>
                            @if ($searchType !== 'all')
                                en <span class="font-semibold">{{ ucfirst($searchType) }}</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Lista de compromisos -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-400">
                @forelse($compromisos as $compromiso)
                    <div
                        class="p-6 text-gray-900 dark:text-slate-200 md:flex md:justify-between border border-slate-400 md:items-center">
                        <div class="flex justify-between items-center text-right mr-10">
                            {{ $compromiso->compromiso_numero }}
                        </div>
                        <div class="flex flex-col mr-7 text-justify w-full rounded-lg select-none">
                            <div>
                                {{ $compromiso->compromiso_nombre }}
                            </div>
                            <div class="mt-1">
                                <p class="font-bold">Cabeza de Sector:</p>
                                @if ($compromiso->dependencia?->dependencia_nombre !== null)
                                    - {{ $compromiso->dependencia?->dependencia_nombre }}
                                @else
                                    <p>- Sin Cabeza de Sector</p>
                                @endif
                            </div>
                            <div class="mt-1">
                                <p class="font-bold">Intervinientes:</p>
                                @php
                                    $nombres = collect($dependencias)
                                        ->whereIn('id', json_decode($compromiso->compromiso_dependencia_intervienen))
                                        ->pluck('dependencia_nombre')
                                        ->toArray();
                                @endphp
                                @forelse ($nombres as $nombre)
                                    <p class="text-justify">- {{ $nombre }}</p>
                                @empty
                                    <p>- Sin Intervinientes</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row items-center gap-3 mt-5 md:mt-0 md:justify-between">
                            <a href="{{ route('mostrar-compromiso', $compromiso->id) }}"
                                class="py-2 px-4 rounded border border-green-700 dark:text-slate-100 hover:bg-green-700 text-xs font-bold uppercase flex items-center justify-center hover:text-white h-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                Mostrar
                            </a>
                            <a href="{{ route('editar-compromiso', $compromiso->id) }}"
                                class="border border-blue-700 py-2 px-4 rounded dark:text-slate-100 hover:bg-blue-700 text-xs font-bold uppercase text-center flex items-center justify-center hover:text-white h-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Editar
                            </a>
                            {{-- <button
                            class="border border-red-700 py-2 px-4 rounded dark:text-slate-100 hover:bg-red-700 text-xs font-bold uppercase text-center flex items-center justify-center hover:text-white h-12"
                            wire:click="$dispatch('deleteAlertCompromisoRecord', {{ $compromiso->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>
                            Eliminar
                        </button> --}}
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-black">
                        @if ($search)
                            No se encontraron compromisos que coincidan con "{{ $search }}".
                        @else
                            No existen compromisos en este momento.
                        @endif
                    </p>
                @endforelse
            </div>
            {{ $compromisos->links() }}
        </div>
    </div>

    @script
        <script>
            Livewire.on('deleteAlertCompromisoRecord', compromisoId => {
                Swal.fire({
                    title: "¿Esta seguro de eliminar este compromiso?",
                    text: "Esta acción no podrá revertirse!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#15803d",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo!",
                    cancelButtonText: "Cancelar",
                    theme: "dark",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-compromiso', {
                            id: compromisoId
                        });
                        Swal.fire({
                            title: "Compromiso Eliminado!",
                            text: "El compromiso ha sido eliminado.",
                            icon: "success"
                        });
                    }
                });
            });
        </script>
    @endscript
</div>
