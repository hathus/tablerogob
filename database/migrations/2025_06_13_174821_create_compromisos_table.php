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
        Schema::create('compromisos', function (Blueprint $table) {
            $table->id();
            $table->string('compromiso_numero')->unique();
            $table->text('compromiso_nombre');
            $table->unsignedBigInteger('dependencia_id')->nullable();
            $table->foreign('dependencia_id')->references('id')->on('dependencias')->nullable();
            $table->json('compromiso_dependencia_intervienen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compromisos');
    }
};
