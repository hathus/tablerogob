<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-start space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dependencias') }}
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('nueva-dependencia') }}"
                    class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                    Crear dependencia
                </a>
                <a href="{{ route('editar-dependencia', 1) }}"
                    class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                    Editar dependencia
                </a>
                <a href="{{ route('mostrar-dependencia', 1) }}"
                    class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                    Mostrar dependencia
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="md:flex md:justify-center p-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
