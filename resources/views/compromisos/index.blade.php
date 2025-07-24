<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-start space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Compromisos') }}
            </h2>

            <div class="flex items-center space-x-4">
                <a href="{{ route('nuevo-compromiso') }}"
                    class="px-3 py-1.5 bg-rosains text-white text-sm rounded hover:bg-[#cd307c] transition">
                    Crear Compromiso
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 alert">
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                    <div id="alert"
                        class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold
                                p-2 my-3 text-center rounded-lg">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
    <livewire:compromisos.show-compromiso />
</x-app-layout>
