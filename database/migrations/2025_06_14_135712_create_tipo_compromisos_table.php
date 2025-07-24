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
        Schema::create('tipo_compromisos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_compromiso_numero')->unique();
            $table->string('tipo_compromiso_nombre');
            $table->string('tipo_compromiso_descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_compromisos');
    }
};
