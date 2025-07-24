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
        Schema::create('dependencia_sectors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eje_id');
            $table->unsignedBigInteger('dependencia_id');
            $table->foreign('eje_id')->references('id')->on('ejes');
            $table->foreign('dependencia_id')->references('id')->on('dependencias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencia_sectors');
    }
};
