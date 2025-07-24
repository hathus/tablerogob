<x-slot name="header">
    <div class="uppercase flex items-center space-x-4">
        <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Avance de Compromiso') }}
        </h2>
    </div>

    <!-- Botón Volver fuera de la caja -->
    <div class="mt-4">
        <a href="{{ route('avance-compromisos') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-300 shadow-sm text-sm"
            title="Volver a la lista">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Volver a la lista
        </a>
    </div>
</x-slot>

<form
    class="md:w-10/12 mx-auto px-8 py-5 mt-5 rounded-3xl bg-white/60 dark:bg-gray-900/70 backdrop-blur-lg shadow-2xl space-y-8 transition duration-300"
    wire:submit.prevent="store" novalidate x-data="{ loading: false }" {{-- showInputs y showForm eliminados --}}
    @submit.prevent="loading = true">
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

    {{-- Fase 1 del formulario completa --}}
    <div id="fase1" class="border p-3 rounded-lg border-doradoins">
        {{-- Fase 1 Alineacion --}}
        <div
            class="bg-white dark:bg-teal-600 overflow-hidden shadow-sm sm:rounded-lg p-2 text-rosains border-b-pink-500 border-b-2">
            Fase 1: Alineación
        </div>
        {{-- Compromisos --}}
        <div class="mt-4" wire:ignore>
            {{-- Campo: Compromisos con búsqueda --}}
            <div class="relative">
                <label for="compromisos"
                    class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
                    Compromisos
                    <select wire:model.defer="compromiso_id" wire:model.live="compromiso_id" style="width: 100%"
                        class="js-compromisos peer pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500 text-justify"
                        name="compromisos">
                        <option value="">Seleccione un Compromiso</option>
                        @forelse($compromisos as $compromiso)
                            <option value="{{ $compromiso->id }}">
                                Compromiso:
                                {{ $compromiso->compromiso_numero }}
                                {{ $compromiso->compromiso_nombre }}
                            </option>
                        @empty
                            <option value="null">No existen registros</option>
                        @endforelse
                    </select>
                </label>
            </div>
        </div>
        <p class="font-bold text-red-600">
            @error('compromiso_id')
                {{ $message }}
            @enderror
        </p>
    </div>

    {{-- Fase 2 del formulario completa --}}
    <div id="fase2" class="border p-3 rounded-lg border-doradoins">
        {{-- Fase 2 Planeacion --}}
        <div
            class="bg-white dark:bg-teal-600 overflow-hidden shadow-sm sm:rounded-lg p-2 text-rosains border-b-pink-500 border-b-2">
            Fase 2: Planeación
        </div>

        {{-- Planeacion Estrategica --}}
        <div class="mt-4">
            <x-input-label class="uppercase" for="plan_e" :value="__('Planeación Estratégica')" />
            <textarea wire:model="plan_e" wire:model.live="plan_e" id="plan_e" cols="15" rows="5"
                x-on:keydown="$wire.longitud_plan_e" wire:keydown="character_count_plan_e" maxlength="600"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm resize-none"
                placeholder="Es la estratégia que brinda el marco real para que tanto los Titulares, como colaboradores comprendan y evalúen la organización, alineando los esfuerzos del equipo, y evitando dejar cosas a la opinión, intuición e improvisación, lo que reduce las probabilidades de errores e incrementa las de éxito. Nota: recuerda que la tienes en la Ficha de Desempeño."></textarea>
            <div class="flex flex-row">
                <span wire:text="longitud_plan_e"></span>
                <p class="ml-1">cáracteres capturados de un máximo de 600</p>
            </div>
            @error('plan_e')
                <p class="font-bold text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Planeacion Operativa --}}
        <div class="mt-4">
            <x-input-label class="uppercase" for="plan_o" :value="__('Planeación Operativa')" />
            <textarea wire:model="plan_o" wire:model.live="plan_o" id="plan_o" cols="15" rows="5" maxlength="600"
                x-on:keydown="$wire.longitud_plan_o" wire:keydown="character_count_plan_o"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm resize-none"
                placeholder="La planificación operativa es el punto de partida para poner en práctiva las acciones y metas trazadas por el nivel táctico, con el fin de alcanzar los objetivos fijados en las decisiones estratégicas."></textarea>
            <div class="flex flex-row">
                <span wire:text="longitud_plan_o"></span>
                <p class="ml-1">cáracteres capturados de un máximo de 600</p>
            </div>
            <p class="font-bold text-red-600">
                @error('plan_o')
                    {{ $message }}
                @enderror
            </p>
        </div>

        {{-- Tipo de Cumplimiento Compromiso --}}
        <div class="mt-4">
            <div class="relative" wire:ignore>
                <label for="tipo_compromiso_id"
                    class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
                    Tipo de Cumplimiento de Compromiso
                </label>
                <select wire:model="tipo_compromiso_id" wire:model.live="tipo_compromiso_id" name="tipo_compromiso_id"
                    style="width: 100%;"
                    class="js-tipo-compromiso peer pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500 text-justify">
                    <option value="">Seleccione un Tipo de Cumplimiento</option>
                    @forelse($tipoCompromisos as $tipoCompromiso)
                        <option value="{{ $tipoCompromiso->id }}">
                            {{ $tipoCompromiso->tipo_compromiso_nombre }}:
                            {{ $tipoCompromiso->tipo_compromiso_descripcion }}
                        </option>
                    @empty
                        <option value="null">No existen registros</option>
                    @endforelse
                </select>
            </div>
            @error('tipo_compromiso_id')
                <p class="font-bold text-red-600">
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    {{-- Fase 3 del formulario completa --}}
    <div id="fase3" class="border p-3 rounded-lg border-doradoins">
        {{-- Fase 3 Presupuesto en $ --}}
        <div
            class="bg-white dark:bg-teal-600 overflow-hidden shadow-sm sm:rounded-lg p-2 text-rosains border-b-pink-500 border-b-2">
            Fase 3: Presupuesto en $. <br />
            Colocar el presupuesto total para el cumplimiento del compromiso por ejercicio fiscal.
        </div>

        <div class="w-full mt-4">
            <div class="relative" wire:ignore>
                <label for="tipo_recurso_id"
                    class="block mb-1 text-sm font-medium text-gray-600 dark:text-gray-300 uppercase">
                    Tipo de Recurso
                </label>
                <select name="tipo_recurso_id" wire:model="tipo_recurso_id" wire:model.live="tipo_recurso_id"
                    style="width: 100%"
                    class="js-tipo-recurso peer pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500 text-justify"
                    name="compromisos">
                    <option value="">Seleccione un Tipo de Recursos</option>
                    @forelse($tipo_recursos as $key => $tipo_recurso)
                        <option value="{{ $key }}">
                            Recurso
                            {{ $tipo_recurso }}
                        </option>
                    @empty
                        <option value="null">No existen registros</option>
                    @endforelse
                </select>
            </div>
            <p class="font-bold text-red-600">
                @error('tipo_recurso_id')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div class="mt-4">
            {{-- Presupuesto por años 21 22 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2 justify-stretch mb-4">
                        <div class="w-full">
                            {{-- 2021 --}}
                            <x-input-label for="pre_year2021" :value="__('2021')" class="uppercase" />
                            <x-text-input id="pre_year2021" wire:model="pre_year2021" wire:model.live="pre_year2021"
                                class="block mt-1 w-full" type="text" min="0" step="0.1"
                                :value="old('pre_year2021')" placeholder="Monto en $"
                                x-mask:dynamic="$money($input, '.', ',', 2)"
                                wire:change="changeMY21Event($event.target.value)" />
                            <p class="font-bold text-red-600">
                                @error('pre_year2021')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2022 --}}
                            <x-input-label for="pre_year2022" :value="__('2022')" class="uppercase" />
                            <x-text-input id="pre_year2022" wire:model="pre_year2022" wire:model.live="pre_year2022"
                                class="block mt-1 w-full" type="text" min="0" step="0.1"
                                :value="old('pre_year2022')" placeholder="Monto en $"
                                x-mask:dynamic="$money($input, '.', ',', 2)"
                                wire:change="changeMY22Event($event.target.value)" />
                            <p class="font-bold text-red-600">
                                @error('pre_year2022')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Presupuesto por años 23 24 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2023 --}}
                            <x-input-label for="pre_year2023" :value="__('2023')" class="uppercase" />
                            <x-text-input id="pre_year2023" wire:model="pre_year2023" wire:model.live="pre_year2023"
                                class="block mt-1 w-full" type="text" min="0" step="0.1"
                                :value="old('pre_year2023')" placeholder="Monto en $"
                                x-mask:dynamic="$money($input, '.', ',', 2)"
                                wire:change="changeMY23Event($event.target.value)" />
                            <p class="font-bold text-red-600">
                                @error('pre_year2023')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2024 --}}
                            <x-input-label for="pre_year2024" :value="__('2024')" class="uppercase" />
                            <x-text-input id="pre_year2024" wire:model="pre_year2024" wire:model.live="pre_year2024"
                                class="block mt-1 w-full" type="text" min="0" step="0.1"
                                :value="old('pre_year2024')" placeholder="Monto en $"
                                x-mask:dynamic="$money($input, '.', ',', 2)"
                                wire:change="changeMY24Event($event.target.value)" />
                            <p class="font-bold text-red-600">
                                @error('pre_year2024')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Presupuesto por años 25 26 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2025 --}}
                            <x-input-label for="pre_year2025" :value="__('2025')" class="uppercase" />
                            <x-text-input id="pre_year2025" wire:model="pre_year2025" wire:model.live="pre_year2025"
                                class="block mt-1 w-full" type="text" min="0" step="0.1"
                                :value="old('pre_year2025')" placeholder="Monto en $"
                                x-mask:dynamic="$money($input, '.', ',', 2)"
                                wire:change="changeMY25Event($event.target.value)" />
                            <p class="font-bold text-red-600">
                                @error('pre_year2025')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2026 --}}
                            <x-input-label for="pre_year2026" :value="__('2026')" class="uppercase" />
                            <x-text-input id="pre_year2026" wire:model="pre_year2026" wire:model.live="pre_year2026"
                                class="block mt-1 w-full" type="text" min="0" step="0.1"
                                :value="old('pre_year2026')" placeholder="Monto en $"
                                x-mask:dynamic="$money($input, '.', ',', 2)"
                                wire:change="changeMY26Event($event.target.value)" />
                            <p class="font-bold text-red-600">
                                @error('pre_year2026')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-1">
                <label for="presupuesto_ejercido">Presupuesto Ejercido a la Fecha</label>
                <x-text-input id="presupuesto_ejercido" wire:model="presupuesto_ejercido" readonly
                    wire:model.live="presupuesto_ejercido"
                    class="block mt-1 w-full group-hover:select-none select-none" type="text" disabled readonly
                    :value="old('presupuesto_ejercido')" min="0" placeholder="En espera de entrada de datos" />
            </div>
        </div>
    </div>

    {{-- Fase 4 del formulario completa --}}
    <div id="fase4" class="border p-3 rounded-lg border-doradoins">
        {{-- Fase 4 Evaluacion en % --}}
        <div
            class="bg-white dark:bg-teal-600 overflow-hidden shadow-sm sm:rounded-lg p-2 text-rosains border-b-pink-500 border-b-2">
            Fase 4: Evaluación en % <br />
            Colocar el % de avance total para el cumplimiento del compromiso por ejercicio fiscal.
        </div>

        <div class="mt-4">
            {{-- Porcentaje de evaluacion por años 21 22 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2 justify-stretch mb-4">
                        <div class="w-full">
                            {{-- 2021 --}}
                            <x-input-label for="eval_year2021" :value="__('2021')" class="uppercase" />
                            <x-text-input id="eval_year2021" wire:model="eval_year2021"
                                wire:model.live="eval_year2021" class="block mt-1 w-full" type="number"
                                min="0" step="10" :value="old('eval_year2021')"
                                wire:change="changeEVP21Event($event.target.value)"
                                placeholder="Porcentaje de Evaluación" />
                            <p class="font-bold text-red-600">
                                @error('eval_year2021')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2022 --}}
                            <x-input-label for="eval_year2022" :value="__('2022')" class="uppercase" />
                            <x-text-input id="eval_year2022" wire:model="eval_year2022"
                                wire:change="changeEVP22Event($event.target.value)" wire:model.live="eval_year2022"
                                class="block mt-1 w-full" type="number" min="0" step="10"
                                :value="old('eval_year2022')" placeholder="Porcentaje de Evaluación" />
                            <p class="font-bold text-red-600">
                                @error('eval_year2022')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Presupuesto por años 23 24 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2023 --}}
                            <x-input-label for="eval_year2023" :value="__('2023')" class="uppercase" />
                            <x-text-input id="eval_year2023" wire:model="eval_year2023"
                                wire:change="changeEVP23Event($event.target.value)" wire:model.live="eval_year2023"
                                class="block mt-1 w-full" type="number" min="0" step="10"
                                :value="old('eval_year2023')" placeholder="Porcentaje de Evaluación" />
                            <p class="font-bold text-red-600">
                                @error('eval_year2023')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2024 --}}
                            <x-input-label for="eval_year2024" :value="__('2024')" class="uppercase" />
                            <x-text-input id="eval_year2024" wire:model="eval_year2024"
                                wire:change="changeEVP24Event($event.target.value)" wire:model.live="eval_year2024"
                                class="block mt-1 w-full" type="number" min="0" step="10"
                                :value="old('eval_year2024')" placeholder="Porcentaje de Evaluación" />
                            <p class="font-bold text-red-600">
                                @error('eval_year2024')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Presupuesto por años 25 26 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2025 --}}
                            <x-input-label for="eval_year2025" :value="__('2025')" class="uppercase" />
                            <x-text-input id="eval_year2025" wire:model="eval_year2025"
                                wire:change="changeEVP25Event($event.target.value)" wire:model.live="eval_year2025"
                                class="block mt-1 w-full" type="number" min="0" step="10"
                                :value="old('eval_year2025')" placeholder="Porcentaje de Evaluación" />
                            <p class="font-bold text-red-600">
                                @error('eval_year2025')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        <div class="w-full">
                            {{-- 2026 --}}
                            <x-input-label for="eval_year2026" :value="__('2026')" class="uppercase" />
                            <x-text-input id="eval_year2026" wire:model="eval_year2026"
                                wire:change="changeEVP26Event($event.target.value)" wire:model.live="eval_year2026"
                                class="block mt-1 w-full" type="number" min="0" step="10"
                                :value="old('eval_year2026')" placeholder="Porcentaje de Evaluación" />
                            <p class="font-bold text-red-600">
                                @error('eval_year2026')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-1">
                <label for="porcentaje_cumplimiento">% de Cumplimiento a la Fecha</label>
                <x-text-input id="porcentaje_cumplimiento" disabled wire:model="porcentaje_cumplimiento"
                    wire:model.live="porcentaje_cumplimiento" class="block mt-1 w-full" type="text"
                    value="{{ $porcentaje_cumplimiento }}" :value="old('porcentaje_cumplimiento')"
                    placeholder="En espera de entrada de datos" />
            </div>
        </div>
    </div>

    {{-- Fase 5 del formulario en proceso --}}
    <div id="fase5" class="border p-3 rounded-lg border-doradoins">
        {{-- Fase 5 Covertura --}}
        <div
            class="bg-white dark:bg-teal-600 overflow-hidden shadow-sm sm:rounded-lg p-2 text-rosains border-b-pink-500 border-b-2">
            Fase 5: Cobertura <br />
            Seleccione los municipios que han sido beneficiados con las acciones realizadas entre 2021 - 2025.
        </div>

        <div class="mt-4">
            {{-- Estatal - Municipal --}}
            <div class="relative" wire:ignore>
                <x-input-label class="uppercase" for="tipo_cobertura" :value="__('Cobertura Estatal o Municipal')" />
                <select name="tipo_cobertura" style="width: 100%;" wire:model="tipo_cobertura"
                    wire:model.live="tipo_cobertura"
                    class="js-estado_municipio peer pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500 text-justify"
                    name="tipo_coberturas">
                    <option value="">Seleccione la Cobertura</option>
                    @forelse($coberturas as $key => $cobertura)
                        <option value="{{ $key }}">
                            {{ $cobertura }}
                        </option>
                    @empty
                        <option value="null">No existen registros</option>
                    @endforelse
                </select>
            </div>
            <p class="font-bold text-red-600">
                @error('tipo_cobertura')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div class="mt-4">
            {{-- Municipios --}}
            <div id="divMunicipios" class="relative hidden" wire:ignore>
                <x-input-label class="uppercase" for="municipios_id" :value="__('Municipios')" />
                <select id="municipios_id" wire:model.defer="municipios_id" wire:model.live="municipios_id" multiple
                    style="width: 100%;"
                    class="js-municipios block mt-1 uppercase border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm">
                    @forelse($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->municipio_nombre }}</option>
                    @empty
                        <p>No existen registros</p>
                    @endforelse
                </select>
                <p class="font-bold text-red-600">
                    @error('municipios_id')
                        {{ $message }}
                    @enderror
                </p>
            </div>
        </div>

        <div class="mt-4">
            {{-- Unidad de Medida Select --}}
            <div class="relative" wire:ignore>
                <x-input-label class="uppercase" for="unidad_medida_sel_id" :value="__('Unidad de Medida')" />
                <select id="unidad_medida_sel_id" style="width: 100%;" wire:model="unidad_medida_sel_id"
                    wire:model.live="unidad_medida_sel_id"
                    class="js-unidad_medida_sel block mt-1 uppercase border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm">
                    <option value="">-- Seleccione una Unidad --</option>
                    @foreach ($unidad_medida_opc as $key => $value)
                        <option value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <p class="font-bold text-red-600">
                @error('unidad_medida_sel_id')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div class="mt-4">
            {{-- Unidad de Medida Singular --}}
            <div id="divUMSin" class="relative hidden" wire:ignore>
                <x-input-label class="uppercase" for="unidad_medida_sin_id" :value="__('Unidad de Medida Singulares')" />
                <select id="unidad_medida_sin_id" wire:model.defer="unidad_medida_sin_id" multiple
                    wire:model.live="unidad_medida_sin_id" style="width: 100%;"
                    class="js-unidad_medida_sin block mt-1 uppercase border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm">
                    <option value="">-- Seleccione una Unidad --</option>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->id }}">
                            {{ $unidad->unidad_medida_singular }}
                        </option>
                    @endforeach
                </select>
                <p class="font-bold text-red-600">
                    @error('unidad_medida_sin_id')
                        {{ $message }}
                    @enderror
                </p>
            </div>
        </div>

        <div class="mt-4">
            {{-- Unidad de Medida Plural --}}
            <div id="divUMPlu" class="relative hidden" wire:ignore>
                <x-input-label class="uppercase" for="unidad_medida_plu_id" :value="__('Unidad de Medida Plurales')" />
                <select id="unidad_medida_plu_id" wire:model="unidad_medida_plu_id" multiple
                    wire:model.live="unidad_medida_plu_id" style="width: 100%;"
                    class="js-unidad_medida_plu block mt-1 uppercase border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm">
                    <option value="">-- Seleccione una Unidad --</option>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->id }}">
                            {{ $unidad->unidad_medida_plural }}
                        </option>
                    @endforeach
                </select>
                @error('unidad_medida_plu_id')
                @enderror
            </div>
        </div>

        {{-- Accion Realizada --}}
        <div class="mt-4">
            <div class="relative" wire:ignore>
                <x-input-label class="uppercase" for="text_accion_realizada" :value="__('Acción Realizada')" />
                <textarea wire:model="text_accion_realizada" wire:model.live="text_accion_realizada"
                    x-on:keydown="$wire.long_text_accion_realizada" wire:keydown="character_count_text_accion_realizada"
                    id="text_accion_realizada" cols="15" rows="5" maxlength="600"
                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm resize-none"
                    placeholder="Describe la acción de acuerdo a la metodología para acciones de impacto."></textarea>
                <div class="flex flex-row">
                    <span wire:text="long_text_accion_realizada"></span>
                    <p class="ml-1">cáracteres capturados de un máximo de 600</p>
                </div>
            </div>
            <p class="text-red-600 font-bold">
                @error('text_accion_realizada')
                    {{ $message }}
                @enderror
            </p>
        </div>
    </div>

    <div id="meta5" class="border p-3 rounded-lg border-doradoins">
        {{-- Meta Alcanzada --}}
        <div class="bg-white dark:bg-teal-600 overflow-hidden shadow-sm sm:rounded-lg p-2 text-rosains border-b-pink-500 border-b-2 mt-3">
            Meta Alcanzada <br />
            Ingrese la cantidad de acciones realizadas entre 2021 - 2026.
        </div>
        <div class="mt-4">
            {{-- Presupuesto por años 21 22 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2 justify-stretch mb-4">
                        <div>
                            {{-- 2021 --}}
                            <x-input-label for="meta_year21" :value="__('2021')" class="uppercase" />
                            <x-text-input id="meta_year21" wire:model="meta_year21" wire:model.live="meta_year21"
                                class="block mt-1 w-full" type="number" min="0" :value="old('meta_year21')"
                                x-mask:dynamic="$money($input, '.', ',', 4)"
                                wire:change="changeEVM21Event($event.target.value)" placeholder="ejemplo: 123456" />
                            @error('meta_year21')
                                <p class="font-bold text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        <div>
                            {{-- 2022 --}}
                            <x-input-label for="meta_year22" :value="__('2022')" class="uppercase" />
                            <x-text-input id="meta_year22" wire:model="meta_year22" wire:model.live="meta_year22"
                                wire:change="changeEVM22Event($event.target.value)" class="block mt-1 w-full"
                                type="number" min="0" :value="old('meta_year22')" placeholder="ejemplo: 123456" />
                            @error('meta_year22')
                                <p class="font-bold text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Presupuesto por años 23 24 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2 justify-stretch mb-4">
                        {{-- 2023 --}}
                        <x-input-label for="meta_year23" :value="__('2023')" class="uppercase" />
                        <x-text-input id="meta_year23" wire:model="meta_year23" wire:model.live="meta_year23"
                            wire:change="changeEVM23Event($event.target.value)" class="block mt-1 w-full"
                            type="number" min="0" :value="old('meta_year23')" placeholder="ejemplo: 123456" />
                        @error('meta_year23')
                            <p class="font-bold text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        {{-- 2024 --}}
                        <x-input-label for="meta_year24" :value="__('2024')" class="uppercase" />
                        <x-text-input id="meta_year24" wire:model="meta_year24" wire:model.live="meta_year24"
                            wire:change="changeEVM24Event($event.target.value)" class="block mt-1 w-full"
                            type="number" min="0" :value="old('meta_year24')" placeholder="ejemplo: 123456" />
                        @error('meta_year24')
                            <p class="font-bold text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Presupuesto por años 25 26 --}}
            <div class="mt-4">
                <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                    <div class="md:flex-col md:w-1/2 justify-stretch mb-4">
                        {{-- 2025 --}}
                        <x-input-label for="meta_year25" :value="__('2025')" class="uppercase" />
                        <x-text-input id="meta_year25" wire:model="meta_year25" wire:model.live="meta_year25"
                            wire:change="changeEVM25Event($event.target.value)" class="block mt-1 w-full"
                            type="number" min="0" :value="old('meta_year25')" placeholder="ejemplo: 123456" />
                        @error('meta_year25')
                            <p class="font-bold text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="md:flex-col md:w-1/2">
                        {{-- 2026 --}}
                        <div class="relative" wire:ignore>
                            <x-input-label for="meta_year26" :value="__('2026')" class="uppercase" />
                            <x-text-input id="meta_year26" wire:model="meta_year26" wire:model.live="meta_year26"
                                wire:change="changeEVM26Event($event.target.value)" class="block mt-1 w-full"
                                type="number" min="0" :value="old('meta_year26')" placeholder="ejemplo: 123456" />
                        </div>
                        @error('meta_year26')
                            <p class="font-bold text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Presupuesto Acumulado y Numero de Beneficiarios, Meta Acumulada --}}
                <div class="mt-4">
                    <div class="md:flex md:flex-row md:justify-between md:space-x-3">
                        <div class="md:flex-col md:w-1/2 justify-stretch mb-4">
                            {{-- Acumulado a la fecha --}}
                            <x-input-label for="meta_acumulada" :value="__('Meta Acumulada a la fecha')" class="uppercase" />
                            <x-text-input id="meta_acumulada" disabled wire:model="meta_acumulada"
                                wire:model.live="meta_acumulada" class="block mt-1 w-full" type="text"
                                :value="old('meta_acumulada')" placeholder="En espera de entrada de datos" />
                            @error('meta_acumulada')
                            @enderror
                        </div>
                        <div class="md:flex-col md:w-1/2">
                            <div class="relative" wire:ignore>
                                {{-- Numero de Beneficiarios --}}
                                <x-input-label for="beneficiarios" :value="__('Numero de Beneficiarios')" class="uppercase" />
                                <x-text-input id="beneficiarios" wire:model="beneficiarios"
                                    wire:model.live="beneficiarios" class="block mt-1 w-full" type="number"
                                    min="0" :value="old('beneficiarios')" placeholder="ejemplo: 123456" />
                            </div>
                            <p class="font-bold text-red-600">
                                @error('beneficiarios')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Fuente de Información --}}
                <div class="mt-4">
                    <div class="relative" wire:ignore>
                        <x-input-label class="uppercase" for="fuente_informacion" :value="__('Fuente de Información')" />
                        <select wire:model="fuente_informacion" multiple wire:model.model.live="fuente_informacion"
                            class="js-fuente-informacion peer w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white/70 dark:bg-gray-800/60 backdrop-blur-md text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-sky-500 focus:outline-none transition duration-200 placeholder-gray-400 dark:placeholder-gray-500"
                            name="dependencias">
                            @forelse($dependencias as $dependencia)
                                <option value="{{ $dependencia->id }}">{{ $dependencia->dependencia_nombre }}
                                    ({{ $dependencia->dependencia_siglas }})
                                </option>
                            @empty
                                <option value="null">No existen registros</option>
                            @endforelse
                        </select>
                    </div>
                    <p class="font-bold text-red-600">
                        @error('fuente_informacion')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                {{-- Medio de Verificación --}}
                <div class="mt-4">
                    <x-input-label class="uppercase" for="medios_verificacion" :value="__('Medios de Verificación')" />
                    <textarea wire:model="medio_verificacion" wire:model.live="medio_verificacion"
                        x-on:keydown="$wire.long_medio_verificacion" wire:keydown="character_count_medio_verificacion"
                        id="medio_verificacion'" cols="15" rows="5" maxlength="1000"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-lime-500 dark:focus:border-lime-600 focus:ring-lime-500 dark:focus:ring-lime-600 rounded-md shadow-sm resize-none"
                        placeholder="Agregar links de notas o publicaciones para su valoración y cumplimiento que servirá como medio de verificación."></textarea>
                    <div class="flex flex-row">
                        <span wire:text="long_medio_verificacion"></span>
                        <p class="ml-1">cáracteres capturados de un máximo de 1000</p>
                    </div>
                    @error('medio_verificacion')
                        <p class="font-bold text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <x-primary-button class="w-full justify-center mt-4">
        Registrar Avance
    </x-primary-button>
    <x-secondary-button class="w-full justify-center mt-4" wire:click='cancel()'>
        Cancelar Registro de Avance
    </x-secondary-button>
</form>

@script
    <script>
        $('.js-compromisos').select2({ // Esta es la clase del componente
            width: 'resolve',
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('compromiso_id', data);
        });

        $('.js-tipo-recurso').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            width: 'resolve',
            placeholder: 'Seleccione un Tipo de Recurso',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('tipo_recurso_id', data);
        });

        $('.js-tipo-compromiso').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            width: 'resolve',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('tipo_compromiso_id', data);
        });

        $('.js-estado_municipio').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            placeholder: 'Seleccione si es Estatal o Municipal',
            width: 'resolve',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('tipo_cobertura', data);
            let element = document.getElementById('divMunicipios');
            if (data === '1') {
                element.classList.add('hidden');
            } else if (data === '2') {
                element.classList.remove('hidden');
            }
        });

        $('.js-municipios').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            placeholder: 'Seleccione uno o más Municipios',
            width: 'resolve',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('municipios_id', data);
        });

        $('.js-unidad_medida_sel').select2({
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            width: 'resolve',
            placeholder: 'Seleccione si la unidad de medida es singular o plural',
        }).on('change', function() {
            let data = $(this).val();
            let elementSin = document.getElementById('divUMSin');
            let elementPlu = document.getElementById('divUMPlu');
            if (data === '1') {
                elementPlu.classList.add('hidden');
                elementSin.classList.remove('hidden');
                $wire.set('unidad_medida_sel_id', data);
            } else if (data === '2') {
                elementSin.classList.add('hidden');
                elementPlu.classList.remove('hidden');
                $wire.set('unidad_medida_sel_id', data);
            }
        });

        $('.js-unidad_medida_sin').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            placeholder: 'Seleccione una unidad de medida',
            width: 'resolve',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('unidad_medidas_id', data);
        });

        $('.js-unidad_medida_plu').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3', //Esta linea le da el tema para tailwind
            width: 'resolve',
            placeholder: 'Seleccione una unidad de medida',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envían a la base de datos
            $wire.set('unidad_medidas_id', data);
        });

        $('.js-fuente-informacion').select2({ // Esta es la clase del componente
            theme: 'tailwindcss-3',
            width: 'resolve',
            placeholder: 'Seleccione su Fuente de Información',
        }).on('change', function() {
            let data = $(this).val(); //Estos son los datos que se envian a la base de datos
            $wire.set('fuente_informacion', data);
        });
    </script>
@endscript
