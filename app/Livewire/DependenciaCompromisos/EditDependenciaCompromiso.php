<?php

namespace App\Livewire\DependenciaCompromisos;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Compromiso;
use App\Models\TipoCompromiso;
use App\Models\Municipio;
use App\Models\UnidadMedida;
use App\Models\Dependencia;
use App\Models\DependenciaCompromiso;
use App\Models\PresupuestoMontoAnios;
use App\Models\EvaluacionPorcentajeAnios;
use App\Models\MetaAnios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Number;
use Livewire\Attributes\Locked;

class EditDependenciaCompromiso extends Component
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

    #[Locked]
    public $dependencia_compromiso_id;

    public function render()
    {
        $compromisos = Compromiso::all();
        $tipoCompromisos = TipoCompromiso::all();
        $municipios = Municipio::all();
        $unidades = UnidadMedida::all();
        $dependencias = Dependencia::all();

        return view('livewire.dependencia-compromisos.edit-dependencia-compromiso', [
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

    public function mount(DependenciaCompromiso $dependencia_compromiso): void
    {
        /* Id del compromiso a editar */
        $this->dependencia_compromiso_id = $dependencia_compromiso->id;

        $datos = DB::table('dependencia_compromisos')->where('id', $this->dependencia_compromiso_id)
            ->select('dependencia_compromisos.medio_verificacion')
            ->firstOrFail();

        /* Fase 1 */
        $this->compromiso_id = $dependencia_compromiso->compromiso_id;

        /* Fase 2 */
        $this->plan_e = $dependencia_compromiso->planeacion_estrategica;
        $this->plan_o = $dependencia_compromiso->planeacion_operativa;
        $this->tipo_compromiso_id = $dependencia_compromiso->tipo_compromiso_id;

        /* Fase 3 */
        $this->tipo_recurso_id = $dependencia_compromiso->tipo_recurso;
        $this->dataMY21 = $this->pre_year2021 = $dependencia_compromiso->presupuestoMontoAnios->where('presupuesto_anio', 2021)->first()->presupuesto_monto ?? 0;
        $this->dataMY22 = $this->pre_year2022 = $dependencia_compromiso->presupuestoMontoAnios->where('presupuesto_anio', 2022)->first()->presupuesto_monto ?? 0;
        $this->dataMY23 = $this->pre_year2023 = $dependencia_compromiso->presupuestoMontoAnios->where('presupuesto_anio', 2023)->first()->presupuesto_monto ?? 0;
        $this->dataMY24 = $this->pre_year2024 = $dependencia_compromiso->presupuestoMontoAnios->where('presupuesto_anio', 2024)->first()->presupuesto_monto ?? 0;
        $this->dataMY25 = $this->pre_year2025 = $dependencia_compromiso->presupuestoMontoAnios->where('presupuesto_anio', 2025)->first()->presupuesto_monto ?? 0;
        $this->dataMY26 = $this->pre_year2026 = $dependencia_compromiso->presupuestoMontoAnios->where('presupuesto_anio', 2026)->first()->presupuesto_monto ?? 0;
        $this->presupuesto_ejercido_raw = $dependencia_compromiso->presupuesto_ejercido;
        $this->presupuesto_acumulado();

        /* Fase 4 */
        $this->eval_year2021 = $this->dataEVP21 = $dependencia_compromiso->evaluacionPorcentajeAnios->where('evaluacion_anio', 2021)->first()->evaluacion_monto ?? 0;
        $this->eval_year2022 = $this->dataEVP22 = $dependencia_compromiso->evaluacionPorcentajeAnios->where('evaluacion_anio', 2022)->first()->evaluacion_monto ?? 0;
        $this->eval_year2023 = $this->dataEVP23 = $dependencia_compromiso->evaluacionPorcentajeAnios->where('evaluacion_anio', 2023)->first()->evaluacion_monto ?? 0;
        $this->eval_year2024 = $this->dataEVP24 = $dependencia_compromiso->evaluacionPorcentajeAnios->where('evaluacion_anio', 2024)->first()->evaluacion_monto ?? 0;
        $this->eval_year2025 = $this->dataEVP25 = $dependencia_compromiso->evaluacionPorcentajeAnios->where('evaluacion_anio', 2025)->first()->evaluacion_monto ?? 0;
        $this->eval_year2026 = $this->dataEVP21 = $dependencia_compromiso->evaluacionPorcentajeAnios->where('evaluacion_anio', 2026)->first()->evaluacion_monto ?? 0;
        $this->porcentaje_cumplimiento();

        /* Fase 5 */
        $this->tipo_cobertura = $dependencia_compromiso->tipo_cobertura;
        $this->unidad_medida_sel_id = $dependencia_compromiso->unidad_medida;
        $this->text_accion_realizada = $dependencia_compromiso->accion_realizada;

        $this->meta_year21 = $this->dataEVM21 = $dependencia_compromiso->metaAnios->where('meta_anio', 2021)->first()->meta_monto ?? 0;
        $this->meta_year22 = $this->dataEVM22 = $dependencia_compromiso->metaAnios->where('meta_anio', 2022)->first()->meta_monto ?? 0;
        $this->meta_year23 = $this->dataEVM23 = $dependencia_compromiso->metaAnios->where('meta_anio', 2023)->first()->meta_monto ?? 0;
        $this->meta_year24 = $this->dataEVM24 = $dependencia_compromiso->metaAnios->where('meta_anio', 2024)->first()->meta_monto ?? 0;
        $this->meta_year25 = $this->dataEVM25 = $dependencia_compromiso->metaAnios->where('meta_anio', 2025)->first()->meta_monto ?? 0;
        $this->meta_year26 = $this->dataEVM26 = $dependencia_compromiso->metaAnios->where('meta_anio', 2026)->first()->meta_monto ?? 0;
        $this->monto_acumulado();

        $this->beneficiarios = $dependencia_compromiso->beneficiarios;
        
        $this->fuente_informacion = $dependencia_compromiso->fuente_informacion;
        $this->medio_verificacion = $datos->medio_verificacion;

        if ($this->unidad_medida_sel_id == 1) {
            $this->unidad_medida_plu_id = null;
            $this->unidad_medida_sin_id = $dependencia_compromiso->unidad_medidas;
        } elseif ($this->unidad_medida_sel_id == 2) {
            $this->unidad_medida_sin_id = null;
            $this->unidad_medida_plu_id = $dependencia_compromiso->unidad_medidas;
        }

        /* Contador de palabras para los text area */
        $this->longitud_plan_e = strlen($this->plan_e);
        $this->longitud_plan_o = strlen($this->plan_o);
        $this->long_text_accion_realizada = strlen($this->text_accion_realizada);
        $this->long_medio_verificacion = strlen($this->medio_verificacion);
    }

    public function insertPMA($id, $isUpdate = false)
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

        Log::info("PMA datos a procesar:", $datos);

        if (!empty($datos)) {
            if ($isUpdate) {
                // Eliminar registros existentes y insertar los nuevos
                PresupuestoMontoAnios::where('dependencia_compromiso_id', $id)->delete();
                PresupuestoMontoAnios::insert($datos);
                Log::info("PMA actualizado exitosamente");
            } else {
                PresupuestoMontoAnios::insert($datos);
                Log::info("PMA insertado exitosamente");
            }
        } else {
            if ($isUpdate) {
                // Si no hay datos en update, eliminar registros existentes
                PresupuestoMontoAnios::where('dependencia_compromiso_id', $id)->delete();
                Log::info("PMA registros eliminados (sin datos nuevos)");
            } else {
                Log::warning("No hay datos PMA para insertar");
            }
        }
    }

    public function insertEPA($id, $isUpdate = false)
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

        Log::info("EPA datos a procesar:", $datosValidadosEPA);

        if (!empty($datosValidadosEPA)) {
            if ($isUpdate) {
                // Eliminar registros existentes y insertar los nuevos
                EvaluacionPorcentajeAnios::where('dependencia_compromiso_id', $id)->delete();
                EvaluacionPorcentajeAnios::insert($datosValidadosEPA);
                Log::info("EPA actualizado exitosamente");
            } else {
                EvaluacionPorcentajeAnios::insert($datosValidadosEPA);
                Log::info("EPA insertado exitosamente");
            }
        } else {
            if ($isUpdate) {
                // Si no hay datos en update, eliminar registros existentes
                EvaluacionPorcentajeAnios::where('dependencia_compromiso_id', $id)->delete();
                Log::info("EPA registros eliminados (sin datos nuevos)");
            } else {
                Log::warning("No hay datos EPA para insertar");
            }
        }
    }

    public function insertMA($id, $isUpdate = false)
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

        Log::info("MA datos a procesar:", $datosValidadosMA);

        if (!empty($datosValidadosMA)) {
            if ($isUpdate) {
                // Eliminar registros existentes y insertar los nuevos
                MetaAnios::where('dependencia_compromiso_id', $id)->delete();
                MetaAnios::insert($datosValidadosMA);
                Log::info("MA actualizado exitosamente");
            } else {
                MetaAnios::insert($datosValidadosMA);
                Log::info("MA insertado exitosamente");
            }
        } else {
            if ($isUpdate) {
                // Si no hay datos en update, eliminar registros existentes
                MetaAnios::where('dependencia_compromiso_id', $id)->delete();
                Log::info("MA registros eliminados (sin datos nuevos)");
            } else {
                Log::warning("No hay datos MA para insertar");
            }
        }
    }

    /**
     * Editar el compromiso de la dependencia.
     */

    public function edit()
    {
        /* Creamos el arreglo vacio para los datos validados y luego los validamos */
        $datosValidadosDC = $this->validate();

        /* Datos Validados Find */
        $avanceCompromisoUPD = DependenciaCompromiso::find($this->dependencia_compromiso_id);

        /* Fase 1 */
        $avanceCompromisoUPD->compromiso_id            = $datosValidadosDC['compromiso_id'];

        /* Fase 2 */
        $avanceCompromisoUPD->planeacion_estrategica   = $datosValidadosDC['plan_e'];
        $avanceCompromisoUPD->planeacion_operativa     = $datosValidadosDC['plan_o'];
        $avanceCompromisoUPD->tipo_compromiso_id       = $datosValidadosDC['tipo_compromiso_id'];

        /* Fase 3 */
        $avanceCompromisoUPD->tipo_recurso             = $datosValidadosDC['tipo_recurso_id'];

        $datosValidadosDC['presupuesto_ejercido'] = $this->presupuesto_ejercido_raw;
        $avanceCompromisoUPD->presupuesto_ejercido     = $datosValidadosDC['presupuesto_ejercido'];

        /* Fase 4 */
        $datosValidadosDC['procentaje_cumplimiento'] = $this->porcentaje_cumplimiento;
        $avanceCompromisoUPD->porcentaje_cumplimiento  = $datosValidadosDC['procentaje_cumplimiento'];

        /* Fase 5 */
        $avanceCompromisoUPD->tipo_cobertura           = $datosValidadosDC['tipo_cobertura'];
        $avanceCompromisoUPD->unidad_medida            = !empty($datosValidadosDC['unidad_medida_sel_id']) ? $datosValidadosDC['unidad_medida_sel_id'] : null;
        $avanceCompromisoUPD->accion_realizada         = !empty($datosValidadosDC['text_accion_realizada']) ? $datosValidadosDC['text_accion_realizada'] : null;

        /* Meta Acumulada */
        $datosValidadosDC['meta_acumulada'] = $this->meta_acumulada;
        $avanceCompromisoUPD->meta_acumulada           = $datosValidadosDC['meta_acumulada'];
        $avanceCompromisoUPD->beneficiarios            = !empty($datosValidadosDC['beneficiarios']) ? $datosValidadosDC['beneficiarios'] : null;
        $avanceCompromisoUPD->medio_verificacion       = !empty($datosValidadosDC['medio_verificacion']) ? $datosValidadosDC['medio_verificacion'] : null;

        /* Cargamos las cajas multiples de select 2 */
        if (!empty($datosValidadosDC['unidad_medidas_id'])) {
            $avanceCompromisoUPD->unidad_medidas =  $datosValidadosDC['unidad_medidas_id'];
            json_encode($avanceCompromisoUPD->unidad_medidas);
        } else {
            $avanceCompromisoUPD->unidad_medidas = [];
        }

        if (!empty($datosValidadosDC['municipios_id'])) {
            $avanceCompromisoUPD->municipios = $datosValidadosDC['municipios_id'];
            json_encode($avanceCompromisoUPD->municipios);
        } else {
            $avanceCompromisoUPD->municipios = [];
        }

        if (!empty($datosValidadosDC['fuente_informacion'])) {
            $avanceCompromisoUPD->fuente_informacion = $datosValidadosDC['fuente_informacion'];
            json_encode($avanceCompromisoUPD->fuente_informacion);
        } else {
            $avanceCompromisoUPD->fuente_informacion = [];
        }

        DB::beginTransaction();

        try {
            // 1. Guardar el registro principal
            $avanceCompromisoUPD->save();

            // 2. Ejecutar las 3 funciones de inserción
            //$this->insertPMA($this->dependencia_compromiso_id);
            //$this->insertEPA($this->dependencia_compromiso_id);
            //$this->insertMA($this->dependencia_compromiso_id);

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
