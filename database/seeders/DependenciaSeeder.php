<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependencias = array(
            array('dependencia_nombre' => 'Secretaría de Gobierno', 'dependencia_siglas' => 'SEGOB', 'dependencia_titular' => 'Lic. Luis Antonio Ramírez Hernández', 'dependencia_cabeza_sector' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Seguridad Ciudadana', 'dependencia_siglas' => 'SSC', 'dependencia_titular' => 'Capitán de Navío IM. DEM. Alberto Martín Perea Marrufo', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretariado Ejecutivo del Sistema Estatal de Seguridad Pública', 'dependencia_siglas' => 'SESESP', 'dependencia_titular' => 'Mtro. Maximino Hernández Pulido', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación Estatal de Protección Civil', 'dependencia_siglas' => 'CEPC', 'dependencia_titular' => 'Lic. Juvencio Nieto Galicia', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Consejo Estatal de Población del Estado de Tlaxcala', 'dependencia_siglas' => 'COESPO', 'dependencia_titular' => 'Lic. Belén Vega Ahuatzin', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Comisión Ejecutiva de Atención a Víctimas del Estado de Tlaxcala', 'dependencia_siglas' => 'CEAVIT', 'dependencia_titular' => 'Mtra. Azalia Cortés García', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Consejería Jurídica del Ejecutivo', 'dependencia_siglas' => 'CJE', 'dependencia_titular' => 'Lic. Rubén Terán Águila', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Unidad de Inteligencia Patrimonial y Económica del Estado de Tlaxcala', 'dependencia_siglas' => 'UIPET', 'dependencia_titular' => 'Lic. Neri Toshiro León Sauza', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Bienestar', 'dependencia_siglas' => 'SB', 'dependencia_titular' => 'Mtra. María Estela Álvarez Corona', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array( 'dependencia_nombre' => 'Comité Consultivo de Bienestar y Desarrollo Social de Tlaxcala', 'dependencia_siglas' => 'CCBDS', 'dependencia_titular' => '', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de las Mujeres del Estado de Tlaxcala', 'dependencia_siglas' => 'SMET', 'dependencia_titular' => 'Lic. Alma Nydia Cano Rodríguez', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto Tlaxcalteca de la Juventud', 'dependencia_siglas' => 'ITJ', 'dependencia_titular' => 'Lic. Lucero Morales Tzompa', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Centro de Rehabilitación Integral y Escuela en Terapia Física y Rehabilitación', 'dependencia_siglas' => 'CRI', 'dependencia_titular' => 'Lic. Irving Uriel Manzano Olvera', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Dirección de Atención a Migrantes', 'dependencia_siglas' => 'DAM', 'dependencia_titular' => 'Lic. Mónica Sánchez Angulo', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Sistema Estatal para el Desarrollo Integral de la Familia', 'dependencia_siglas' => 'SEDIF', 'dependencia_titular' => 'Mtra. Flor de María López Hinojosa', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Patrimonio de la Beneficencia Pública del Estado de Tlaxcala', 'dependencia_siglas' => 'APBPET', 'dependencia_titular' => 'C. Heriberto Antonio Flores García', 'dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Educación Pública de Tlaxcala y Unidad de Servicios Educativos', 'dependencia_siglas' => 'SEPE-USET', 'dependencia_titular' =>	'Dr. Homero Meneses Hernández','dependencia_cabeza_sector' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Cultura', 'dependencia_siglas' => 'SC', 'dependencia_titular' =>	'Mtra. Karen Álvarez Villeda','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Centro de Vinculación y Desarrollo Regional', 'dependencia_siglas' => 'CVDR', 'dependencia_titular' =>	'Lic. Víctor Oswaldo Rodríguez Arreola','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Colegio de Bachilleres del Estado de Tlaxcala', 'dependencia_siglas' => 'COBAT', 'dependencia_titular' =>	'Dr. José Alonso Trujillo Domínguez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Colegio de Educación Profesional Técnica del Estado de Tlaxcala', 'dependencia_siglas' => 'CONALEP', 'dependencia_titular' =>	'Mtro. Darwin Pérez y Pérez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Colegio de Estudios Científicos y Tecnológicos del Estado de Tlaxcala', 'dependencia_siglas' => 'CECYTE', 'dependencia_titular' =>	'Lic. Blas Marvin Mora Olvera','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación de Servicio Social de Estudiantes de las Instituciones de Educación Superior', 'dependencia_siglas' => 'COSSIES', 'dependencia_titular' =>	'Mtro. Victor Manuel Báez Alvarado','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'El Colegio de Tlaxcala A.C.', 'dependencia_siglas' => 'COLTLAX', 'dependencia_titular' =>	'Dr. Serafín Ríos Elorza','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto del Deporte de Tlaxcala', 'dependencia_siglas' => 'IDET', 'dependencia_titular' =>	'Dr. Daniel Moncayo Cervantes','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto Tecnológico Superior de Tlaxco', 'dependencia_siglas' => 'ITST', 'dependencia_titular' =>	'Mtra. Luz Vera Díaz','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto Tlaxcalteca de la Infraestructura Física Educativa', 'dependencia_siglas' => 'ITIFE', 'dependencia_titular' =>	'Arq. Mateo Sergio Sánchez Ramírez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto Tlaxcalteca para la Educación de Los Adultos', 'dependencia_siglas' => 'ITEA', 'dependencia_titular' =>	'Lic. Michaelle Brito Vázquez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Universidad Politécnica de Tlaxcala', 'dependencia_siglas' => 'UPT', 'dependencia_titular' =>	'Dra. Rosalía Nalleli Pérez Estrada','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Universidad Politécnica de Tlaxcala Región Poniente', 'dependencia_siglas' => 'UPTRP', 'dependencia_titular' =>	'Mtro. Víctor Castro López','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Universidad Tecnológica de Tlaxcala', 'dependencia_siglas' => 'UTT', 'dependencia_titular' =>	'Mtro. Lenin Calva Pérez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Universidad Intercultural de Tlaxcala', 'dependencia_siglas' => 'UIT', 'dependencia_titular' =>	'Mtro. Ulises Tamayo Pérez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Archivo Historico del Estado de Tlaxcala', 'dependencia_siglas' => 'AGHET', 'dependencia_titular' =>	'Lic. Mayra Vázquez Velázquez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Salud / O.P.D. Salud del Estado de Tlaxcala', 'dependencia_siglas' => 'SESA', 'dependencia_titular' =>	'Dr. Rigoberto Zamudio Meneses','dependencia_cabeza_sector' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto Tlaxcalteca de Asistencia Especializada a la Salud', 'dependencia_siglas' => 'ITAES', 'dependencia_titular' =>	'Dr. Adán Baltazar Lima Bernal','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Comisión Estatal de Arbitraje Médico', 'dependencia_siglas' => 'CEAM', 'dependencia_titular' =>	'Dr. Óscar Xicohténcatl Pérez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Comisión Estatal para la Protección Contra Riesgos Sanitarios del Estado de Tlaxcala', 'dependencia_siglas' => 'COEPRIST', 'dependencia_titular' =>	'Dra. Mónica Yazmín Jiménez Gutiérrez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación Estatal IMSS-Bienestar', 'dependencia_siglas' => 'IMSS-BIENESTAR', 'dependencia_titular' =>	'Dr. Gabriel Gutiérrez Morales','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Desarrollo Económico', 'dependencia_siglas' => 'SEDECO', 'dependencia_titular' =>	'Lic. Javier Marroquín Calderón','dependencia_cabeza_sector' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Turismo', 'dependencia_siglas' => 'SECTURE', 'dependencia_titular' =>	'Lic. Fabricio Mena Rodríguez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Impulso Agropecuario', 'dependencia_siglas' => 'SIA', 'dependencia_titular' =>	'Lic. Rafael de la Peña Bernal','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría del Trabajo y Competitividad', 'dependencia_siglas' => 'STyC', 'dependencia_titular' =>	'Mtro. José Noe Altamirano Islas','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto Tlaxcalteca de Desarrollo Taurino', 'dependencia_siglas' => 'ITDT', 'dependencia_titular' =>	'C. José Luis Angelino Arriaga','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Casa de las Artesanías de Tlaxcala', 'dependencia_siglas' => 'CAT', 'dependencia_titular' =>	'Lic. Saúl Pérez Bravo','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Fideicomiso de la Ciudad Industrial Xicohténcatl', 'dependencia_siglas' => 'FIDECIX', 'dependencia_titular' =>	'Lic. Haidé Gisela Lucero Zepeda','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Fondo Macro Para El Desarrollo Integral del Estado de Tlaxcala', 'dependencia_siglas' => 'FOMTLAX', 'dependencia_titular' =>	'Lic. Carlos Augusto Pérez Hernández','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto de Capacitación para el Trabajo del Estado de Tlaxcala', 'dependencia_siglas' => 'ICATLAX', 'dependencia_titular' =>	'Mtro. Juan Javier Potrero Tizamitl','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Infraestructura', 'dependencia_siglas' => 'SI', 'dependencia_titular' =>	'Arq. Eduardo Rubén Hernández Tapia','dependencia_cabeza_sector' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Movilidad y Transporte del Estado de Tlaxcala', 'dependencia_siglas' => 'SMyT', 'dependencia_titular' =>	'Lic. Marco Tulio Munive Temoltzin','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Ordenamiento Territorial y Vivienda', 'dependencia_siglas' => 'SOTyV', 'dependencia_titular' =>	'Lic. David Guerrero Tapia','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto de Catastro del Estado de Tlaxcala', 'dependencia_siglas' => 'IDC', 'dependencia_titular' =>	'Ing. Rafael Rogelio Espinoza Osorio','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de Medio Ambiente', 'dependencia_siglas' => 'SMA', 'dependencia_titular' =>	'Mtro. Pedro Aquino Alvarado','dependencia_cabeza_sector' => true, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Comisión Estatal de Agua y Saneamiento del Estado de Tlaxcala', 'dependencia_siglas' => 'CEAS', 'dependencia_titular' =>	'L.C.F. Javier Israel Tobón Solano','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Procuraduría del Medio Ambiente del Estado de Tlaxcala', 'dependencia_siglas' => 'PROPAET', 'dependencia_titular' =>	'Lic. Iván García Juárez','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación de Bienestar Animal', 'dependencia_siglas' => 'CBA', 'dependencia_titular' =>	'Lic. Stefany Pérez Bustamante','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Instituto de Fauna Silvestre para el Estado de Tlaxcala', 'dependencia_siglas' => 'IFAST', 'dependencia_titular' =>	'Lic. Sonia Tepatzí Carranco','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Oficialía Mayor de Gobierno', 'dependencia_siglas' => 'OMG', 'dependencia_titular' =>	'Lic. Ramiro Vivanco Chedraui','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaria de Finanzas', 'dependencia_siglas' => 'SF', 'dependencia_titular' =>	'C.P. David Álvarez Ochoa','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría de la Función Pública', 'dependencia_siglas' => 'SFP', 'dependencia_titular' =>	'C.P. María Isabel Delfina Maldonado Textle','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación General de Planeación e Inversión', 'dependencia_siglas' => 'CGPI', 'dependencia_titular' =>	'Dr. Noé Rodríguez Roldán','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación de Comunicación', 'dependencia_siglas' => 'CCOM', 'dependencia_titular' =>	'Mtro. Octavio Ortega Velio Mejia','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Coordinación de Radio, Cine y Televisión del Estado de Tlaxcala', 'dependencia_siglas' => 'CORACYT', 'dependencia_titular' =>	'Lic. Angélica Domínguez Hernández','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Casa de Representación Tlaxcala en Ciudad de México', 'dependencia_siglas' => 'CTCDMX', 'dependencia_titular' =>	'Lic. Steve Esteban Del Razo Montiel','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Pensiones Civiles del Estado del Estado de Tlaxcala', 'dependencia_siglas' => 'PCET', 'dependencia_titular' =>	'Lic. Radahid Hernández López','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Secretaría Particular de la Gobernadora', 'dependencia_siglas' => 'SP', 'dependencia_titular' =>	'Lic. Gelacio Montiel Fuentes','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

            array('dependencia_nombre' => 'Transversal', 'dependencia_siglas' => 'T', 'dependencia_titular' =>	'','dependencia_cabeza_sector' => false, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
        );

        DB::table('dependencias')->insert($dependencias);
    }
}
