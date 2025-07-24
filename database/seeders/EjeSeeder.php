<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ejes = array(
            array('eje_numero' => '1', 'eje_nombre' => 'Estado de Derecho y Seguridad', 'sub_sector_numero' => '1', 'sub_sector_nombre' => null,  'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            //array('eje_numero' => '2', 'eje_nombre' => 'Bienestar para Todos', 'sub_sector_numero' => null, 'sub_sector_nombre' => null,  'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '2', 'eje_nombre' => 'Bienestar para Todos', 'sub_sector_numero' => '2.1', 'sub_sector_nombre' => 'Bienestar', 'eje_transversal' => true,  'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '2', 'eje_nombre' => 'Bienestar para Todos', 'sub_sector_numero' => '2.2', 'sub_sector_nombre' => 'Educacion', 'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '2', 'eje_nombre' => 'Bienestar para Todos', 'sub_sector_numero' => '2.3', 'sub_sector_nombre' => 'Salud', 'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            //array('eje_numero' => '3', 'eje_nombre' => 'Desarrollo Económico y Medio Ambiente', 'sub_sector_numero' => null, 'sub_sector_nombre' => null,  'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '3', 'eje_nombre' => 'Desarrollo Económico y Medio Ambiente', 'sub_sector_numero' => '3.1', 'sub_sector_nombre' => 'Desarrollo Economico', 'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '3', 'eje_nombre' => 'Desarrollo Económico y Medio Ambiente', 'sub_sector_numero' => '3.2', 'sub_sector_nombre' => 'Desarrollo Urbano, Infraestructura y Vivienda', 'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '3', 'eje_nombre' => 'Desarrollo Económico y Medio Ambiente', 'sub_sector_numero' => '3.3', 'sub_sector_nombre' => 'Medio Ambiente', 'eje_transversal' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_numero' => '4', 'eje_nombre' => 'Gobierno Cercano con Vision Extendida', 'sub_sector_numero' => '4', 'sub_sector_nombre' => null, 'eje_transversal' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
        );

        DB::table('ejes')->insert($ejes);
    }
}
