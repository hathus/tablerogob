<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold sm:text-xl text-gray-800 dark:text-gray-200 leading-tight text-sm">
            Mostrar Dependencia
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="md:flex md:justify-center p-5">
                        <livewire:dependencias.show-dependencia />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
