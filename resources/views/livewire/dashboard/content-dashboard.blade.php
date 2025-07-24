<div>
    @forelse ($dependencias as $dependencia)
        <a href="{{ route('uxcompromisos') }}">
            <x-secondary-button class="w-full text-center rounded p-3 uppercase my-2">
                @if ($dependencia->dependencia_cabeza_sector)
                    <p>Cabeza de Sector:
                        {{ $dependencia->dependencia_nombre }} ({{ $dependencia->dependencia_siglas }})
                    </p>
                @else
                    {{ $dependencia->dependencia_nombre }}
                @endif
            </x-secondary-button>
        </a>
    @empty
        <p>No existen datos para mostrar</p>
    @endforelse
</div>
