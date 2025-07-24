
document.addEventListener('livewire:init', () => {
    // Función para inicializar Select2
    function initializeSelect2(element) {
        if (!element) return;

        // Destruir instancia existente
        if ($(element).hasClass('select2-hidden-accessible')) {
            $(element).select2('destroy');
        }

        // Inicializar Select2
        $(element).select2({
            placeholder: 'Selecciona opciones',
            allowClear: true,
            width: '100%',
            theme: 'tailwindcss-3',
        });

        // Manejar cambios para Livewire
        $(element).on('change', function() {
            const data = $(this).val();
            const model = $(this).attr('wire:model');
            if (model) {
                window.Livewire.find(
                    $(this).closest('[wire\\:id]').attr('wire:id')
                ).set(model, data);
            }
        });
    }

    // Inicializar al cargar
    Livewire.hook('morph.updated', ({ el }) => {
        $(el).find('select[multiple]').each(function() {
            initializeSelect2(this);
        });
    });

    // Escuchar eventos personalizados
    Livewire.on('reinitSelect2', () => {
        $('select[multiple]').each(function() {
            initializeSelect2(this);
        });
    });

    // Inicialización inicial
    $(document).ready(function() {
        $('select[multiple]').each(function() {
            initializeSelect2(this);
        });
    });
});
