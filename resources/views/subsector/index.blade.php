<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold sm:text-xl text-gray-800 dark:text-gray-200 leading-tight text-sm">
            Sub Sectores
        </h2>

        <div class="flex items-center space-x-4">
            <a href="{{ route('nuevo-subsector') }}"
               class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                Crear Subsector
            </a>
            <a href="{{ route('editar-subsector', 1) }}"
               class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                Editar Subsector
            </a>
            <a href="{{ route('mostrar-subsector', 1) }}"
               class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                Mostrar Subsector
            </a>
        </div>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- <h1 class="text-2xl font-bold text-center mb-10">Nuevo Expediente Medico</h1> --}}

                    <div class="md:flex md:justify-center p-5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
