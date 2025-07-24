<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold sm:text-xl text-gray-800 dark:text-gray-200 leading-tight text-sm">
            Mostrar Compromiso
        </h2>

        <!-- Botón Volver fuera de la caja -->
        <div class="mt-4">
            <a href="{{ route('compromisos') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300 shadow-sm"
               title="Volver a la lista">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="md:flex md:justify-center p-5">
                        <div class="mr-7">
                            {{$compromiso->compromiso_numero}}
                        </div>
                        <div class=" rounded-lg text-justify mr-7 select-none w-full">
                            {{ $compromiso->compromiso_nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
