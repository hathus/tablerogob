<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DependenciaSectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependencias_sector = array(
            array('eje_id' => '1', 'dependencia_id' => '1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '2', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '3', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '4', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '5', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '6', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '7', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '1', 'dependencia_id' => '8', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '2', 'dependencia_id' => '9', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '2', 'dependencia_id' => '11', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '2', 'dependencia_id' => '12', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '2', 'dependencia_id' => '13', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '2', 'dependencia_id' => '14', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '2', 'dependencia_id' => '15', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '2', 'dependencia_id' => '16', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '3', 'dependencia_id' => '17', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '18', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '19', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '20', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '21', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '22', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '23', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '24', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '25', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '26', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '27', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '28', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '29', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '30', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '31', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '32', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '3', 'dependencia_id' => '33', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '4', 'dependencia_id' => '34', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '4', 'dependencia_id' => '35', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '4', 'dependencia_id' => '36', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '4', 'dependencia_id' => '37', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '4', 'dependencia_id' => '38', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '5', 'dependencia_id' => '39', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '40', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '41', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '42', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '43', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '44', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '45', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '46', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '5', 'dependencia_id' => '47', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '6', 'dependencia_id' => '48', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '6', 'dependencia_id' => '49', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '6', 'dependencia_id' => '50', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '6', 'dependencia_id' => '51', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '7', 'dependencia_id' => '52', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '7', 'dependencia_id' => '53', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '7', 'dependencia_id' => '54', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '7', 'dependencia_id' => '55', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '7', 'dependencia_id' => '56', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('eje_id' => '8', 'dependencia_id' => '57', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '58', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '59', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '60', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '61', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '62', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '63', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '64', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
            array('eje_id' => '8', 'dependencia_id' => '65', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
        );

        DB::table('dependencia_sectors')->insert($dependencias_sector);
    }
}
