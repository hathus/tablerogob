<x-slot name="header">
    <div class="flex items-center space-x-4">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Mostrar Sub Sector') }}
        </h2>
    </div>
    <div class="mb-1 mt-2">
        <a href="{{ route('subsector') }}"
           class="inline-flex items-center gap-2 px-6 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300 shadow-sm"
           title="Volver a la lista">
            <svg xmlns="http://www.w3.org="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Volver
        </a>
    </div>
</x-slot>


<form wire:submit.prevent="editCompromise"
      x-data="{ loading: false }" 
      @submit.prevent="loading = true"
      class="relative max-w-2xl mx-auto w-full px-8 py-10 mt-10 rounded-3xl bg-white/60 dark:bg-gray-900/70 backdrop-blur-lg shadow-2xl space-y-8 transition duration-300">

    {{-- Barra de progreso superior --}}
    <div x-show="loading" x-transition
         class="absolute top-0 left-0 w-full h-1 bg-sky-500 animate-pulse z-50 rounded-t-2xl"></div>
    {{-- Mensaje de éxito --}}
    @if (session()->has('message'))
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             x-transition
             class="text-sky-700 dark:text-sky-400 bg-sky-100 border border-sky-400 rounded-lg px-4 py-3 text-center font-semibold">
            {{ session('message') }}
        </div>
    @endif


    {{-- Campo: Número de sub sector --}}
    <div class="relative"> {{-- x-show y x-transition eliminados --}}
        <label for="subsector_numero"
               class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Número de sub sector</label>
        <input id="subsector_numero" type="number" min="1"
               wire:model.defer="subsector_numero"
               placeholder="Ej. 123"
               class="peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500"/>
        <div class="absolute right-3 top-9">
            @error('subsector_numero')
            <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            @else
                @if (!empty($subsector_numero))
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                @endif
                @enderror
        </div>

        @error('subsector_numero')
        <p class="text-sm text-sky-500 mt-1">{{ $message }}</p>
        @enderror
    </div>


    {{-- Campo: Descripción del sub sector --}}
    <div class="relative">
        <label for="subsector_nombre"
               class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase"> Descripción del sub sector</label>
        <input id="subsector_nombre" type="text"
               wire:model.defer="subsector_nombre"
               placeholder="Descripción del Sub Sector"
               class="peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500"/>
        <div class="absolute right-3 top-9">
            @error('subsector_nombre')
            <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            @else
                @if (!empty($subsector_nombre))
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                @endif
                @enderror
        </div>

        @error('subsector_nombre')
        <p class="text-sm text-sky-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Campo: Responsable Oficio con búsqueda --}}
<div x-data="selectSearch({
        options: [
            { value: 'dep1', label: 'Dependencia 1' },
            { value: 'dep2', label: 'Dependencia 2' },
            { value: 'dep3', label: 'Dependencia 3' },
            { value: 'dep4', label: 'Dependencia 4' },
            { value: 'test1', label: 'Prueba 1' },
            { value: 'test2', label: 'Prueba 2' },
            { value: 'test3', label: 'Prueba 3' },
            { value: 'test4', label: 'Prueba 4' }
        ],
        selected: @entangle('gender')
    })" class="relative w-full">
    
    <label for="gender" class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">Responsable Oficio</label>
    
    <div @click.away="close()" class="relative">
        <input type="text"
               x-model="search"
               @click="if (search) search = ''; open()"
               placeholder="-- Seleccione una Dependencia --"
               class="w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200" />
               
        <input type="hidden" name="gender" :value="selected" />
        
        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400">
            <!-- Flecha abajo -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>

        <!-- Dropdown -->
<ul x-show="openList"
    x-transition
    x-scroll-lock
    class="absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 shadow-lg backdrop-blur-md">
    
    <template x-for="option in filteredOptions()" :key="option.value">
        <li @click="select(option)" 
            class="cursor-pointer px-4 py-2 hover:bg-sky-500 hover:text-white" 
            :class="{ 'bg-sky-600 text-white': selected === option.value }" 
            x-text="option.label">
        </li>
    </template>

    <li x-show="filteredOptions().length === 0" class="px-4 py-2 text-gray-500">
        No se encontraron opciones
    </li>
</ul>

    </div>

    @error('gender')
    <p class="text-sm text-sky-500 mt-1">{{ $message }}</p>
    @enderror
</div>

<script>
    function selectSearch({ options, selected }) {
        return {
            options,
            selected,
            search: '',
            openList: false,
            open() {
                this.openList = true;
            },
            close() {
                this.openList = false;
                if (!this.options.some(o => o.label.toLowerCase() === this.search.toLowerCase())) {
                    this.search = this.selectedLabel() ?? '';
                }
            },
            select(option) {
                this.selected = option.value;
                this.search = option.label;
                this.openList = false;
            },
            filteredOptions() {
                if (this.search === '') return this.options;
                return this.options.filter(o => o.label.toLowerCase().includes(this.search.toLowerCase()));
            },
            selectedLabel() {
                const found = this.options.find(o => o.value === this.selected);
                return found ? found.label : '';
            },
        }
    }
</script>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.directive('scroll-lock', (el) => {
        el.addEventListener('wheel', function(e) {
            const atTop = el.scrollTop === 0;
            const atBottom = el.scrollHeight - el.scrollTop === el.clientHeight;
            const scrollingUp = e.deltaY < 0;
            const scrollingDown = e.deltaY > 0;

            if ((scrollingUp && atTop) || (scrollingDown && atBottom)) {
                e.preventDefault();
            }
        }, { passive: false });
    });
});
</script>


{{-- Campo: Intervinientes Oficio (checkboxes) --}}
<div>
    <label class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
        Intervinientes Oficio
    </label>
    <div class="space-y-2 bg-white/70 dark:bg-gray-800/60 rounded-xl p-4 border border-gray-300 dark:border-gray-600 backdrop-blur-md shadow-inner">
        <label class="flex items-center space-x-2">
            <input type="checkbox" value="dep1" wire:model.defer="intervinientes"
                   class="rounded text-sky-600 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-transparent focus:shadow-none" />
            <span class="text-gray-800 dark:text-gray-200">Dependencia 1</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="checkbox" value="dep2" wire:model.defer="intervinientes"
                   class="rounded text-sky-600 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-transparent focus:shadow-none" />
            <span class="text-gray-800 dark:text-gray-200">Dependencia 2</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="checkbox" value="dep3" wire:model.defer="intervinientes"
                   class="rounded text-sky-600 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-transparent focus:shadow-none" />
            <span class="text-gray-800 dark:text-gray-200">Dependencia 3</span>
        </label>
                <label class="flex items-center space-x-2">
            <input type="checkbox" value="dep3" wire:model.defer="intervinientes"
                   class="rounded text-sky-600 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-transparent focus:shadow-none" />
            <span class="text-gray-800 dark:text-gray-200">Dependencia 4</span>
        </label>
                <label class="flex items-center space-x-2">
            <input type="checkbox" value="dep3" wire:model.defer="intervinientes"
                   class="rounded text-sky-600 border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-transparent focus:shadow-none" />
            <span class="text-gray-800 dark:text-gray-200">Dependencia 5</span>
        </label>
    </div>
    @error('intervinientes')
    <p class="text-sm text-sky-500 mt-1">{{ $message }}</p>
    @enderror
</div>

<style>
    input[type="checkbox"]:focus,
    input[type="checkbox"]:active {
      outline: none !important;
      box-shadow: none !important;
      border-color: transparent !important;
    }
</style>

    {{-- Botón: Guardar --}}
    <div>
        <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-bold shadow-lg transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="loading">
            <svg x-show="loading" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10"
                        stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            <span x-show="!loading">IMPRIMIR</span>
        </button>
    </div>


    {{-- Botón: Cancelar --}}
    <div>
        <a href="{{ route('subsector') }}"
           class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-red-900 hover:bg-red-700 text-white font-bold shadow-lg transition duration-300 ring-1 ring-red-700 hover:bg-red-600 hover:shadow-xl hover:ring-red-500">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Cancelar</span>
        </a>
    </div>
</form>