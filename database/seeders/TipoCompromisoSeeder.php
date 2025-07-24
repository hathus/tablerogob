<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCompromisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_compromisos = array(
            array('tipo_compromiso_numero' => '1', 'tipo_compromiso_nombre' => 'Cumplimiento Único', 'tipo_compromiso_descripcion' => 'Por su naturaleza se cumple con una sola acción ú obra.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('tipo_compromiso_numero' => '2', 'tipo_compromiso_nombre' => 'Cumplimiento Normal', 'tipo_compromiso_descripcion' =>  'Se cumple con una actividad que se puede llevar a cabo en un año o menos.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('tipo_compromiso_numero' => '3', 'tipo_compromiso_nombre' => 'Facultativo o Permanente', 'tipo_compromiso_descripcion' => 'Por sus facultades, por que es la garantia de un derecho, un proceso largo y dificil de cumplir o por que se mide con un indicador macro, como la pobreza, alimentación, salud, metas progresiva.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('tipo_compromiso_numero' => '4', 'tipo_compromiso_nombre' => 'Multianual', 'tipo_compromiso_descripcion' => 'Se cumple con una serie de actividades en varios años, en todos los casos menos de 6 años.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
        );

        DB::table('tipo_compromisos')->insert($tipo_compromisos);
    }
}
