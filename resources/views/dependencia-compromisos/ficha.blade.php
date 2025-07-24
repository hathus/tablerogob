<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold sm:text-xl text-gray-800 dark:text-gray-200 leading-tight text-sm">
            Ficha de Impacto Dependencia-Compromiso
        </h2>

        <!-- Contenedor botones -->
        <div class="mt-4 flex gap-4 flex-wrap">
            <!-- Botón Volver -->
            <a href="{{ route('avance-compromisos') }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300 shadow-sm"
                title="Volver a la lista">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Volver
            </a>

            <!-- Botón Imprimir -->
            <button onclick="window.print()"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-500 dark:bg-blue-600 text-white font-semibold hover:bg-blue-600 dark:hover:bg-blue-700 transition duration-300 shadow-sm"
                title="Imprimir esta página">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2m-6 0v4m0 0H8m4 0h4" />
                </svg>
                Imprimir
            </button>
        </div>

        <!-- Estilos para impresión -->
        <style>
            @media print {
                body * {
                    visibility: hidden !important;
                }

                #printable,
                #printable * {
                    visibility: visible !important;
                }

                #printable {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    padding: 0;
                    margin: 0;
                }
            }
        </style>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <!-- Aquí el id que usamos para impresión -->
                    <div id="printable" class="md:flex md:justify-center p-3 w-full">
                        <livewire:dependencia-compromisos.ficha-dependencia-compromiso :dependencia_compromiso="$dependencia_compromiso" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
