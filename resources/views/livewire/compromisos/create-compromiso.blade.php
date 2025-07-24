<x-slot name="header">
    <div class="uppercase flex items-center space-x-4">
        <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear compromiso') }}
        </h2>
    </div>

    <!-- Botón Volver fuera de la caja -->
    <div class="mt-4">
        <a href="{{ route('compromisos') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300 shadow-sm"
            title="Volver a la lista">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Volver
        </a>
    </div>
</x-slot>


<form wire:submit.prevent="store" x-data="{ loading: false }" {{-- showInputs y showForm eliminados --}} @submit.prevent="loading = true"
    class="relative max-w-2xl mx-auto w-full px-8 py-10 mt-10 rounded-3xl bg-white/60 dark:bg-gray-900/70 backdrop-blur-lg shadow-2xl space-y-8 transition duration-300">

    {{-- Barra de progreso superior --}}
    <div x-show="loading" x-transition
        class="absolute top-0 left-0 w-full h-1 bg-sky-500 animate-pulse z-50 rounded-t-2xl"></div>
    {{-- Mensaje de éxito --}}
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
            class="text-sky-700 dark:text-sky-400 bg-sky-100 border border-sky-400 rounded-lg px-4 py-3 text-center font-semibold">
            {{ session('message') }}
        </div>
    @endif


    {{-- Campo: Número de eje --}}
    <div class="relative"> {{-- x-show y x-transition eliminados --}}
        <label for="compromiso_numero"
            class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Número de
            compromiso</label>
        <input id="compromiso_numero" type="number" min="1" step="0.1" wire:model.defer="compromiso_numero"
            placeholder="Ej. 123 ó'1.2"
            class="peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500" />
        <div class="absolute right-3 top-9">
            @error('compromiso_numero')
                <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                @if (!empty($compromiso_numero))
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                @endif
            @enderror
        </div>

        @error('compromiso_numero')
            <p class="text-sm text-sky-500 mt-1">{{ $message }}</p>
        @enderror
    </div>


    {{-- Campo: Nombre del Compromiso --}}
    <div class="relative"> {{-- x-show y x-transition eliminados --}}
        <label for="compromiso_nombre"
            class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
            Nombre del Compromiso</label>
        <textarea x-on:keyup="$wire.longitud_nombre_compromiso++" wire:keyup="character_count" maxlength="250"
            wire:model.defer="compromiso_nombre" placeholder="Nombre del compromiso" id="compromiso_nombre"
            name="compromiso_nombre" rows="4" cols="50"
            class="peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500 resize-none">
        </textarea>
        <div class="flex flex-row">
            <span wire:text="longitud_nombre_compromiso"></span>
            <p class="ml-1">cáracteres capturados de un máximo de 250</p>
        </div>
        <div class="absolute right-3 top-9">
            @error('compromiso_nombre')
                <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @else
                @if (!empty($compromiso_nombre))
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                @endif
            @enderror
        </div>

        @error('compromiso_nombre')
            <p class="text-sm text-sky-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Campo: Responsable Oficio con búsqueda --}}
    <div class="relative" wire:ignore>
        <label for="dependencias" class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
            Dependencia Responsable Oficio
        </label>
        <select wire:model="dependencia_id" wire:model.model.live="dependencia_id"
            class="js-dependencia-responsable peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500"
            name="dependencias">
            <option value="">Seleccione una Dependencia Responsable</option>
            @forelse($dependencias as $dependencia)
                <option value="{{ $dependencia->id }}">{{ $dependencia->dependencia_nombre }}
                    ({{ $dependencia->dependencia_siglas }})
                </option>
            @empty
                <option value="null">No existen registros</option>
            @endforelse
        </select>
    </div>

    {{-- Campo: Intervinientes Oficio (checkboxes) --}}
    <div class="relative" wire:ignore>
        <label for="compromiso_dependencia_intervienen"
            class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
            Dependencia Intervinientes Oficio
        </label>
        <select multiple="multiple" wire:model="compromiso_dependencia_intervienen"
            wire:model.live="compromiso_dependencia_intervienen"
            class="js-dependencias-intervinientes peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500"
            name="compromiso_dependencia_intervienen">
            @forelse($dependencias as $dependencia)
                <option value="{{ $dependencia->id }}">{{ $dependencia->dependencia_nombre }}
                    ({{ $dependencia->dependencia_siglas }})
                </option>
            @empty
                <option value="null">No existen registros</option>
            @endforelse
        </select>
    </div>

    {{-- Botón: Guardar --}}
    <div>
        <button type="submit"
            class="uppercase w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-sky-600 hover:bg-sky-400 text-white font-bold shadow-lg transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
            :disabled="loading">
            <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            <span x-show="!loading">Crear Compromiso</span>
        </button>
    </div>


    {{-- Botón: Cancelar --}}
    <div>
        <a href="{{ route('compromisos') }}"
            class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-red-700 hover:bg-rojoins text-white font-bold shadow-lg transition duration-300 ring-1 ring-red-700 hover:bg-red-600 hover:shadow-xl hover:ring-red-500">
            <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                    stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            <span>CANCELAR</span>
        </a>
    </div>
</form>

@script
    <script>
        $(document).ready(function() {
            $('.js-dependencia-responsable').select2({ // Esta es la clase del componente
                theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            }).on('change', function() {
                let data = $(this).val(); //Estos son los datos que se envian a la base de datos
                $wire.set('dependencia_id', data);
            });

            $('.js-dependencias-intervinientes').select2({
                theme: 'tailwindcss-3',
                placeholder: 'Seleccione una o más Dependencias Intervinientes',
            }).on('change', function() {
                let data = $(this).val();
                $wire.set('compromiso_dependencia_intervienen', data);
            });
        });
    </script>
@endscript
