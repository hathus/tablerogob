<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdsConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ods_conceptos = array(
            array('ods_concepto_numero' => '1 ', 'ods_concepto_descripcion' => 'Fin de la pobreza', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '2 ', 'ods_concepto_descripcion' => 'Hambre cero', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '3 ', 'ods_concepto_descripcion' => 'Salud y bienestar', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '4 ', 'ods_concepto_descripcion' => 'Educación de calidad', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '5 ', 'ods_concepto_descripcion' => 'Igualdad de género', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '6 ', 'ods_concepto_descripcion' => 'Agua limpia y saneamiento', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '7 ', 'ods_concepto_descripcion' => 'Energía esequible y no contaminante', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '8 ', 'ods_concepto_descripcion' => 'Trabajo decente y crecimiento económico', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '9 ', 'ods_concepto_descripcion' => 'Industria, innovación e infraestructura', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '10',  'ods_concepto_descripcion' => 'Reducción de las desigualdades', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '11',  'ods_concepto_descripcion' => 'Ciudades y comunidades sostenibles', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '12',  'ods_concepto_descripcion' => 'Producción y consumo responsables', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '13',  'ods_concepto_descripcion' => 'Acción por el clima', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '14',  'ods_concepto_descripcion' => 'Vida Submarina', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '15',  'ods_concepto_descripcion' => 'Vida de ecosistemas terrestres', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '16',  'ods_concepto_descripcion' => 'Paz, justicia e instituciones sólidas', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('ods_concepto_numero' => '17',  'ods_concepto_descripcion' => 'Alianza para lograr los objetivos', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
        );

        DB::table('ods_conceptos')->insert($ods_conceptos);
    }
}
