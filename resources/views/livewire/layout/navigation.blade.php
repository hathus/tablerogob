<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>
<nav x-data="{ open: false }"
    class="sticky top-0 z-20 is-fixed-top bg-white dark:bg-base3 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> --}}
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate :class="request()->routeIs('dashboard')
                        ? 'text-rosains border-b-2 border-rosains hover:text-rosains'
                        : 'text-moradoins border-b-2 border-transparent hover:text-rosains'">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    {{-- Menú Desplegable para Gestión --}}
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-moradoins dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-rosains dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __('Gestión') }}</div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                {{-- Enlaces del Menú de Gestión --}}
                                <x-dropdown-link :href="route('compromisos')" :active="request()->routeIs('compromisos', 'nuevo-compromiso')" wire:navigate :class="request()->routeIs('compromisos', 'nuevo-compromiso')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Compromisos') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('dependencias')" :active="request()->routeIs('dependencias')" wire:navigate :class="request()->routeIs('dependencias')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Dependencias') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('dependencias-sector')" :active="request()->routeIs('dependencias-sector')" wire:navigate :class="request()->routeIs('dependencias-sector')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Dependencias por Sector') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('ejes')" :active="request()->routeIs('ejes')" wire:navigate :class="request()->routeIs('ejes')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Ejes') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('municipios')" :active="request()->routeIs('municipios')" wire:navigate :class="request()->routeIs('municipios')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Municipios') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('ods')" :active="request()->routeIs('ods')" wire:navigate :class="request()->routeIs('ods')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('ODS') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('subsector')" :active="request()->routeIs('subsector')" wire:navigate :class="request()->routeIs('subsector')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Subsectores') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('tipo-compromiso')" :active="request()->routeIs('tipo-compromiso')" wire:navigate :class="request()->routeIs('tipo-compromiso')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Tipos de Compromiso') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('unidad-medida')" :active="request()->routeIs('unidad-medida')" wire:navigate :class="request()->routeIs('unidad-medida')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Unidades de Medida') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('avance-compromisos')" :active="request()->routeIs('avance-compromisos')" wire:navigate :class="request()->routeIs('avance-compromisos')
                                    ? 'text-rosains'
                                    : 'text-moradoins hover:text-rosains transition duration-150'">
                                    {{ __('Avance de Compromisos') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    {{-- Fin del Menú Desplegable --}}
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate :class="request()->routeIs('dashboard')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            {{-- Elementos del menú de gestión en la vista responsiva --}}
            <x-responsive-nav-link :href="route('compromisos')" :active="request()->routeIs('compromisos', 'nuevo-compromiso')" wire:navigate :class="request()->routeIs('compromisos', 'nuevo-compromiso')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Compromisos') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dependencias')" :active="request()->routeIs('dependencias')" wire:navigate :class="request()->routeIs('dependencias')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Dependencias') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dependencias-sector')" :active="request()->routeIs('dependencias-sector')" wire:navigate :class="request()->routeIs('dependencias-sector')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Dependencias por Sector') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('ejes')" :active="request()->routeIs('ejes')" wire:navigate :class="request()->routeIs('ejes')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Ejes') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('municipios')" :active="request()->routeIs('municipios')" wire:navigate :class="request()->routeIs('municipios')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Municipios') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('ods')" :active="request()->routeIs('ods')" wire:navigate :class="request()->routeIs('ods')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('ODS') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('subsector')" :active="request()->routeIs('subsector')" wire:navigate :class="request()->routeIs('subsector')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Subsectores') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('tipo-compromiso')" :active="request()->routeIs('tipo-compromiso')" wire:navigate :class="request()->routeIs('tipo-compromiso')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Tipos de Compromiso') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('unidad-medida')" :active="request()->routeIs('unidad-medida')" wire:navigate :class="request()->routeIs('unidad-medida')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Unidades de Medida') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('avance-compromisos')" :active="request()->routeIs('avance-dependencia-compromisos')" wire:navigate :class="request()->routeIs('avance-dependencia-compromisos')
                ? 'text-rosains'
                : 'text-moradoins hover:text-rosains transition duration-150'">
                {{ __('Avance de Compromisos') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                    x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
