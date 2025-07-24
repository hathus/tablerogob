<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dependencia_compromisos', function (Blueprint $table) {
            $table->id();
            $table->text('planeacion_estrategica');
            $table->text('planeacion_operativa');
            $table->integer('tipo_cobertura');
            $table->json('municipios');
            $table->integer('unidad_medida');
            $table->json('unidad_medidas');
            $table->text('accion_realizada');
            $table->integer('beneficiarios');
            $table->json('fuente_informacion');
            $table->text('medio_verificacion');
            $table->float('presupuesto_ejercido');
            $table->integer('porcentaje_cumplimiento');
            $table->integer('meta_acumulada');
            $table->foreignId('tipo_compromiso_id')->references('id')->on('tipo_compromisos');
            $table->foreignId('compromiso_id')->references('id')->on('compromisos');
            $table->foreignId('usuario_id')->constrained('users'); // Nuevo campo para usuario
            $table->integer('tipo_recurso'); // Nuevo campo para tipo de recurso
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencia_compromisos');
    }
};
