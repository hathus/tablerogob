<?php

namespace App\Livewire\DependenciaCompromisos;

use App\Models\Compromiso;
use App\Models\Dependencia;
use App\Models\DependenciaCompromiso;
use App\Models\EvaluacionPorcentajeAnios;
use App\Models\MetaAnios;
use App\Models\Municipio;
use App\Models\PresupuestoMontoAnios;
use App\Models\TipoCompromiso;
use App\Models\UnidadMedida;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Number;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateDependenciaCompromiso extends Component
{
    /*Datos a Validar de los Campos del Formulario*/
    // Fase 1 Selección de Compromiso
    #[Validate('required', message: 'Seleccione un Compromiso')]
    public $compromiso_id;

    // Fase 2 Selección Planeación Estrategica y operativa
    #[Validate('required', message: 'Ingrese la información requerida')]
    public $plan_e;

    #[Validate('required', message: 'Ingrese la información requerida')]
    public $plan_o;

    #[Validate('required', message: 'Seleccione un Tipo de Compromiso')]
    public $tipo_compromiso_id;

    /* Monto de la Fase 3 Presupuesto monto anios */
    #[Validate('required', message: 'El Tipo de Recurso es necesario')]
    public $tipo_recurso_id;

    #[Validate('required', message: 'El Monto del año 2021 es requerido, si no hay monto, ingrese 0')]
    public $pre_year2021;

    #[Validate('required', message: 'El Monto del año 2022 es requerido, si no hay monto, ingrese 0')]
    public $pre_year2022;

    #[Validate('required', message: 'El Monto del año 2023 es requerido, si no hay monto, ingrese 0')]
    public $pre_year2023;

    #[Validate('required', message: 'El Monto del año 2024 es requerido, si no hay monto, ingrese 0')]
    public $pre_year2024;

    #[Validate('required', message: 'El Monto del año 2025 es requerido, si no hay monto, ingrese 0')]
    public $pre_year2025;

    #[Validate('required', message: 'El Monto del año 2026 es requerido, si no hay monto, ingrese 0')]
    public $pre_year2026;

    /* Texto de la fase 4  Evaluacion de porcentajes*/
    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2021 es requerido, si no hay porcentaje, ingrese 0')]
    public $eval_year2021;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2022 es requerido, si no hay porcentaje, ingrese 0')]
    public $eval_year2022;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2023 es requerido, si no hay porcentaje, ingrese 0')]
    public $eval_year2023;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2024 es requerido, si no hay porcentaje, ingrese 0')]
    public $eval_year2024;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2025 es requerido, si no hay porcentaje, ingrese 0')]
    public $eval_year2025;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2026 es requerido, si no hay porcentaje, ingrese 0')]
    public $eval_year2026;

    /* Fase 5 Cobertura*/
    #[Validate('required', message: 'El Tipo de Cobertura es necesario')]
    public $tipo_cobertura;

    #[Validate('required', message: 'Seleccione una unidad de medida')]
    public int $unidad_medida_sel_id;

    #[Validate('required', message: 'Describa la Acción Realizada')]
    public $text_accion_realizada;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2021 es requerido, si no hay porcentaje, ingrese 0')]
    public $meta_year21;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2022 es requerido, si no hay porcentaje, ingrese 0')]
    public $meta_year22;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2023 es requerido, si no hay porcentaje, ingrese 0')]
    public $meta_year23;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2024 es requerido, si no hay porcentaje, ingrese 0')]
    public $meta_year24;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2025 es requerido, si no hay porcentaje, ingrese 0')]
    public $meta_year25;

    #[Validate('required', message: 'El Porcentaje de Evaluación del año 2026 es requerido, si no hay porcentaje, ingrese 0')]
    public $meta_year26;

    #[Validate('required', message: 'Se requiere el número de beneficiarios')]
    public $beneficiarios;

    #[Validate('required', message: 'Se requiere la fuente de la información')]
    public $fuente_informacion = [];

    #[Validate('required', message: 'El Medio de Verificación es necesario')]
    public $medio_verificacion;

    /*Variables para contar los caracteres de los text*/
    public $longitud_plan_e;
    public $longitud_plan_o;

    /* Array que llana los tipos de recursos */
    public $tipo_recursos = [
        1 => 'Federal',
        2 => 'Estatal',
        3 => 'Ingresos Propios',
    ];

    public $unidad_medida_opc = [
        1 => 'Singular',
        2 => 'Plural',
    ];

    public $meta_acumulada = 0;

    public $unidad_medidas_id = [];
    public $unidad_medida_sin_id;
    public $unidad_medida_plu_id;

    public array $coberturas = [
        1 => 'Estatal',
        2 => 'Municipal',
    ];

    public $municipios_id = [];

    public $long_text_accion_realizada;
    public $text_fuente_informa;
    public $long_fuente_informacion;
    public $long_medio_verificacion;
    public $long_accion_realizada;

    /* Datos para la Fase 3 */
    public $presupuesto_ejercido;
    public float $presupuesto_ejercido_raw = 0;
    public float $dataMY21 = 0;
    public float $dataMY22 = 0;
    public float $dataMY23 = 0;
    public float $dataMY24 = 0;
    public float $dataMY25 = 0;
    public float $dataMY26 = 0;

    /* Datos para la fase 4 */
    public $porcentaje_cumplimiento;
    public float $dataEVP21 = 0;
    public float $dataEVP22 = 0;
    public float $dataEVP23 = 0;
    public float $dataEVP24 = 0;
    public float $dataEVP25 = 0;
    public float $dataEVP26 = 0;

    /* Datos Fase 5 */
    public $monto_acumulado;
    public float $dataEVM21 = 0;
    public float $dataEVM22 = 0;
    public float $dataEVM23 = 0;
    public float $dataEVM24 = 0;
    public float $dataEVM25 = 0;
    public float $dataEVM26 = 0;


    public function render()
    {
        $compromisos = Compromiso::all();
        $tipoCompromisos = TipoCompromiso::all();
        $municipios = Municipio::all();
        $unidades = UnidadMedida::all();
        $dependencias = Dependencia::all();

        return view('livewire.dependencia-compromisos.create-dependencia-compromiso', [
            'compromisos' => $compromisos,
            'tipoCompromisos' => $tipoCompromisos,
            'municipios' => $municipios,
            'unidades' => $unidades,
            'dependencias' => $dependencias,
        ]);
    }

    public function cancel()
    {
        return redirect()->route('avance-compromisos');
    }

    public function insertPMA($id)
    {
        $datos = [];
        for ($year = 2021; $year <= 2026; $year++) {
            $propertyMonto = "pre_year{$year}";

            // Debug: verificar si las propiedades existen
            Log::info("Checking PMA properties for year {$year}:", [
                'propertyMonto' => $propertyMonto,
                'monto_value' => $this->$propertyMonto ?? 'NO EXISTE'
            ]);

            // Solo verificamos si existe el monto y no está vacío (incluso 0 es válido)
            if (property_exists($this, $propertyMonto) && $this->$propertyMonto !== null && $this->$propertyMonto !== '') {
                $datos[] = [
                    'presupuesto_anio' => $year, // Usamos directamente el año del loop
                    'presupuesto_monto' => str_replace(',', '', $this->$propertyMonto),
                    'tipo_recurso' => $this->tipo_recurso_id,
                    'dependencia_compromiso_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        Log::info("PMA datos a insertar:", $datos);

        if (!empty($datos)) {
            PresupuestoMontoAnios::insert($datos);
            Log::info("PMA insertado exitosamente");
        } else {
            Log::warning("No hay datos PMA para insertar");
        }
    }

    public function insertEPA($id)
    {
        $datosValidadosEPA = [];
        for ($year = 2021; $year <= 2026; $year++) {
            $propertyEvalPer = "eval_year{$year}";

            // Debug: verificar si las propiedades existen
            Log::info("Checking EPA properties for year {$year}:", [
                'propertyEvalPer' => $propertyEvalPer,
                'eval_value' => $this->$propertyEvalPer ?? 'NO EXISTE'
            ]);

            // Solo verificamos si existe el porcentaje y no está vacío (incluso 0 es válido)
            if (property_exists($this, $propertyEvalPer) && $this->$propertyEvalPer !== null && $this->$propertyEvalPer !== '') {
                $datosValidadosEPA[] = [
                    'evaluacion_anio' => $year, // Usamos directamente el año del loop
                    'evaluacion_monto' => str_replace(',', '', $this->$propertyEvalPer),
                    'dependencia_compromiso_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        Log::info("EPA datos a insertar:", $datosValidadosEPA);

        if (!empty($datosValidadosEPA)) {
            EvaluacionPorcentajeAnios::insert($datosValidadosEPA);
            Log::info("EPA insertado exitosamente");
        } else {
            Log::warning("No hay datos EPA para insertar");
        }
    }

    public function insertMA($id)
    {
        $datosValidadosMA = [];

        // Mapeo correcto de años basado en los logs
        $yearMapping = [
            2021 => '21',
            2022 => '22',
            2023 => '23',
            2024 => '24',
            2025 => '25',
            2026 => '26'
        ];

        for ($year = 2021; $year <= 2026; $year++) {
            $shortYear = $yearMapping[$year];
            $propertyMetaMonto = "meta_year{$shortYear}";

            // Debug: verificar si las propiedades existen
            Log::info("Checking MA properties for year {$year}:", [
                'propertyMetaMonto' => $propertyMetaMonto,
                'meta_value' => $this->$propertyMetaMonto ?? 'NO EXISTE'
            ]);

            // Solo verificamos si existe la meta y no está vacía (incluso 0 es válido)
            if (property_exists($this, $propertyMetaMonto) && $this->$propertyMetaMonto !== null && $this->$propertyMetaMonto !== '') {
                $datosValidadosMA[] = [
                    'meta_anio' => $year, // Usamos directamente el año del loop
                    'meta_monto' => str_replace(',', '', $this->$propertyMetaMonto),
                    'dependencia_compromiso_id' => $id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        Log::info("MA datos a insertar:", $datosValidadosMA);

        if (!empty($datosValidadosMA)) {
            MetaAnios::insert($datosValidadosMA);
            Log::info("MA insertado exitosamente");
        } else {
            Log::warning("No hay datos MA para insertar");
        }
    }

    public function store()
    {
        $datosValidadosDC = [];

        $this->validate();

        // Debug: mostrar todas las propiedades del objeto
        Log::info("Propiedades del objeto antes de insertar:", get_object_vars($this));

        $datosValidadosDC['planeacion_estrategica'] = $this->plan_e;
        $datosValidadosDC['planeacion_operativa'] = $this->plan_o;
        $datosValidadosDC['tipo_cobertura'] = $this->tipo_cobertura;
        $datosValidadosDC['unidad_medida'] = $this->unidad_medida_sel_id;
        $datosValidadosDC['accion_realizada'] = $this->text_accion_realizada;
        $datosValidadosDC['beneficiarios'] = $this->beneficiarios;
        $datosValidadosDC['medio_verificacion'] = $this->medio_verificacion;
        $datosValidadosDC['porcentaje_cumplimiento'] = $this->porcentaje_cumplimiento;
        $datosValidadosDC['meta_acumulada'] = $this->meta_acumulada;
        $datosValidadosDC['tipo_compromiso_id'] = $this->tipo_compromiso_id;
        $datosValidadosDC['compromiso_id'] = $this->compromiso_id;
        $datosValidadosDC['presupuesto_ejercido'] = $this->presupuesto_ejercido_raw;
        $datosValidadosDC['tipo_recurso'] = $this->tipo_recurso_id;
        $datosValidadosDC['usuario_id'] = auth()->user()->id; // Asignar el ID del usuario autenticado

        if ($this->unidad_medidas_id != null) {
            $datosValidadosDC['unidad_medidas'] = json_encode($this->unidad_medidas_id);
        } else {
            $datosValidadosDC['unidad_medidas'] = json_encode([]);
        }

        if ($this->municipios_id != null) {
            $datosValidadosDC['municipios'] = json_encode($this->municipios_id);
        } else {
            $datosValidadosDC['municipios'] = json_encode([]);
        }

        if ($this->fuente_informacion != null) {
            $datosValidadosDC['fuente_informacion'] = json_encode($this->fuente_informacion);
        } else {
            $datosValidadosDC['fuente_informacion'] = json_encode([]);
        }

        DB::beginTransaction();

        try {
            // 1. Guardar el registro principal
            $doneDependenciaCompromiso = DependenciaCompromiso::create($datosValidadosDC);
            Log::info("DependenciaCompromiso creado con ID: " . $doneDependenciaCompromiso->id);

            // 2. Ejecutar las 3 funciones de inserción
            $this->insertPMA($doneDependenciaCompromiso->id);
            $this->insertEPA($doneDependenciaCompromiso->id);
            $this->insertMA($doneDependenciaCompromiso->id);

            DB::commit();
            Log::info("Transacción completada exitosamente");

            emotify('success', 'El compromiso se creó correctamente!');
            return redirect()->route('avance-compromisos');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en store(): ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            emotify('error', 'Error al crear el compromiso: ' . $e->getMessage());
        }
    }

    public function mount(): void
    {
        $this->longitud_plan_e = strlen($this->plan_e);
        $this->longitud_plan_o = strlen($this->plan_o);
        $this->long_text_accion_realizada = strlen($this->text_accion_realizada);
        $this->long_medio_verificacion = strlen($this->medio_verificacion);
    }

    public function character_count_plan_e()
    {
        $this->longitud_plan_e = strlen($this->plan_e);
    }

    public function character_count_plan_o()
    {
        $this->longitud_plan_o = strlen($this->plan_o);
    }

    public function character_count_text_accion_realizada()
    {
        $this->long_text_accion_realizada = strlen($this->text_accion_realizada);
    }

    public function character_count_medio_verificacion()
    {
        $this->long_medio_verificacion = strlen($this->medio_verificacion);
    }

    /* Funciones de la fase 3 */
    public function changeMY21Event($data)
    {
        $this->dataMY21 = (float) str_replace(',', '', $data);
        if ($data === '') {
            $data = 0;
            $this->dataMY21 = 0;
        }
        $this->presupuesto_acumulado();
    }

    public function changeMY22Event($data)
    {
        $this->dataMY22 = (float) str_replace(',', '', $data);
        if ($data === '') {
            $data = 0;
            $this->dataMY22 = 0;
        }
        $this->presupuesto_acumulado();
    }

    public function changeMY23Event($data)
    {
        $this->dataMY23 = (float) str_replace(',', '', $data);
        if ($data === '') {
            $data = 0;
            $this->dataMY23 = 0;
        }
        $this->presupuesto_acumulado();
    }

    public function changeMY24Event($data)
    {
        $this->dataMY24 = (float) str_replace(',', '', $data);
        if ($data === '') {
            $data = 0;
            $this->dataMY24 = 0;
        }
        $this->presupuesto_acumulado();
    }

    public function changeMY25Event($data)
    {
        $this->dataMY25 = (float) str_replace(',', '', $data);
        if ($data === '') {
            $data = 0;
            $this->dataMY25 = 0;
        }
        $this->presupuesto_acumulado();
    }

    public function changeMY26Event($data)
    {
        $this->dataMY26 = (float) str_replace(',', '', $data);
        if ($data === '') {
            $data = 0;
            $this->dataMY26 = 0;
        }
        $this->presupuesto_acumulado();
    }

    public function presupuesto_acumulado()
    {
        $presupuestoAcumulado = $this->dataMY21 + $this->dataMY22 + $this->dataMY23 + $this->dataMY24 + $this->dataMY25 + $this->dataMY26;
        $this->presupuesto_ejercido_raw = $presupuestoAcumulado;
        $this->presupuesto_ejercido = Number::currency($presupuestoAcumulado, in: 'MXN', locale: 'es_MX', precision: 2);
    }

    /* Funciones de la fase 4 */
    public function changeEVP21Event($data)
    {
        $this->dataEVP21 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVP21 = 0;
        }
        $this->porcentaje_cumplimiento();
    }

    public function changeEVP22Event($data)
    {
        $this->dataEVP22 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVP22 = 0;
        }
        $this->porcentaje_cumplimiento();
    }

    public function changeEVP23Event($data)
    {
        $this->dataEVP23 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVP23 = 0;
        }
        $this->porcentaje_cumplimiento();
    }

    public function changeEVP24Event($data)
    {
        $this->dataEVP24 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVP24 = 0;
        }
        $this->porcentaje_cumplimiento();
    }

    public function changeEVP25Event($data)
    {
        $this->dataEVP25 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVP25 = 0;
        }
        $this->porcentaje_cumplimiento();
    }

    public function changeEVP26Event($data)
    {
        $this->dataEVP26 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVP26 = 0;
        }
        $this->porcentaje_cumplimiento();
    }

    public function porcentaje_cumplimiento()
    {
        $this->porcentaje_cumplimiento = $this->dataEVP21 + $this->dataEVP22 + $this->dataEVP23 + $this->dataEVP24 + $this->dataEVP25 + $this->dataEVP26;
    }

    /* Funciones de la fase 5 */
    public function changeEVM21Event($data)
    {
        $this->dataEVM21 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVM21 = 0;
        }
        $this->monto_acumulado();
    }

    public function changeEVM22Event($data)
    {
        $this->dataEVM22 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVM22 = 0;
        }
        $this->monto_acumulado();
    }

    public function changeEVM23Event($data)
    {
        $this->dataEVM23 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVM23 = 0;
        }
        $this->monto_acumulado();
    }

    public function changeEVM24Event($data)
    {
        $this->dataEVM24 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVM24 = 0;
        }
        $this->monto_acumulado();
    }

    public function changeEVM25Event($data)
    {
        $this->dataEVM25 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVM25 = 0;
        }
        $this->monto_acumulado();
    }

    public function changeEVM26Event($data)
    {
        $this->dataEVM26 = (float) $data;
        if ($data === '') {
            $data = 0;
            $this->dataEVM26 = 0;
        }
        $this->monto_acumulado();
    }

    public function monto_acumulado()
    {
        $this->meta_acumulada = $this->dataEVM21 + $this->dataEVM22 + $this->dataEVM23 + $this->dataEVM24 + $this->dataEVM25 + $this->dataEVM26;
    }
}
