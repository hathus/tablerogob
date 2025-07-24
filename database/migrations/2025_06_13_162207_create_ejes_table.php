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
        Schema::create('ejes', function (Blueprint $table) {
            $table->id();
            $table->integer('eje_numero');
            $table->string('eje_nombre');
            $table->float('sub_sector_numero')->nullable()->unique();
            $table->string('sub_sector_nombre')->nullable();
            $table->boolean('eje_transversal')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejes');
    }
};
