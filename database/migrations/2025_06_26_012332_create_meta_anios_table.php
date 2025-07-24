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
        Schema::create('meta_anios', function (Blueprint $table) {
            $table->id();
            $table->integer('meta_anio');
            $table->integer('meta_monto');
            $table->foreignId('dependencia_compromiso_id')->references('id')->on('dependencia_compromisos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_anios');
    }
};
