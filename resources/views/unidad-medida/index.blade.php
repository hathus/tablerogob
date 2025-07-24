<x-app-layout>
<x-slot name="header">
    <div class="flex flex-col items-start space-y-4">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Unidades de Medida') }}
        </h2>
        <div class="flex items-center space-x-4">
            <a href="{{ route('nuevo-unidad-medida') }}"
               class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                Crear Unidad de Medida
            </a>
            <a href="{{ route('editar-unidad-medida', 1) }}"
               class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                Editar Unidad de Medida
            </a>
            <a href="{{ route('mostrar-unidad-medida', 1) }}"
               class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                Mostrar Unidad de Medida
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
