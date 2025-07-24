<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompromisoController;
use App\Http\Controllers\DependenciaCompromisoController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\DependenciaSectorController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth', 'verified')->group(function () {
    // Rutas para compromisos
    Route::view('compromisos', 'compromisos.index')->name('compromisos');
    Route::view('nuevo-compromiso', 'compromisos.create')->name('nuevo-compromiso');
    Route::get('/compromiso/{compromiso}/edit', [CompromisoController::class, 'edit'])->name('editar-compromiso');
    Route::get('/compromiso/{compromiso}/show', [CompromisoController::class, 'show'])->name('mostrar-compromiso');

    // Rutas para dependencias
    Route::view('dependencias', 'dependencias.index')->name('dependencias');
    Route::view('nueva-dependencia', 'dependencias.create')->name('nueva-dependencia');
    Route::get('/dependencia/{dependencia}/edit', [DependenciaController::class, 'edit'])->name('editar-dependencia');
    Route::get('/dependencia/{dependencia}/show', [DependenciaController::class, 'show'])->name('mostrar-dependencia');

    // Rutas para Dependencias por sector
    Route::view('dependencias-sector', 'dependencias-sector.index')->name('dependencias-sector');
    Route::view('nueva-dependencia-sector', 'dependencias-sector.create')->name('nueva-dependencia-sector');
    Route::get('/dependencia-sector/{dependencia_sec_id}/edit', [DependenciaSectorController::class, 'edit'])->name('editar-dependencia-sector');
    Route::get('/dependencia-sector/{dependencia_sec_id}/show', [DependenciaSectorController::class, 'show'])->name('mostrar-dependencia-sector');

    // Rutas para ejes
    Route::view('ejes', 'ejes.index')->name('ejes');
    Route::view('nuevo-eje', 'ejes.create')->name('nuevo-eje');
    Route::get('/eje/{eje_id}/edit', [\App\Http\Controllers\EjeController::class, 'edit'])->name('editar-eje');
    Route::get('/eje/{eje_id}/show', [\App\Http\Controllers\EjeController::class, 'show'])->name('mostrar-eje');

    // Rutas para municipios
    Route::view('municipios', 'municipios.index')->name('municipios');
    Route::view('nuevo-municipio', 'municipio.create')->name('nuevo-municipio');
    Route::get('/municipio/{municipio_id}/edit', [\App\Http\Controllers\MunicipioController::class, 'edit'])->name('editar-municipio');
    Route::get('/municipio/{municipio_id}/show', [\App\Http\Controllers\MunicipioController::class, 'show'])->name('mostrar-municipio');

    // Rutas para ods
    Route::view('ods', 'ods.index')->name('ods');
    Route::view('nuevo-ods', 'ods.create')->name('nuevo-ods');
    Route::get('/ods/{ods_id}/edit', [\App\Http\Controllers\OdsConceptoController::class, 'edit'])->name('editar-ods');
    Route::get('/ods/{ods_id}/show', [\App\Http\Controllers\OdsConceptoController::class, 'show'])->name('mostrar-ods');

    // Rutas para sub sector
    Route::view('subsector', 'subsector.index')->name('subsector');
    Route::view('nuevo-subsector', 'subsector.create')->name('nuevo-subsector');
    Route::get('/subsector/{subsector_id}/edit', [\App\Http\Controllers\SubSectorController::class, 'edit'])->name('editar-subsector');
    Route::get('/subsector/{subsector_id}/show', [\App\Http\Controllers\SubSectorController::class, 'show'])->name('mostrar-subsector');

    // Rutas para tipo compromiso
    Route::view('tipo-compromiso', 'tipo-compromiso.index')->name('tipo-compromiso');
    Route::view('nuevo-tipo-compromiso', 'tipo-compromiso.create')->name('nuevo-tipo-compromiso');
    Route::get('/tipo-compromiso/{tipo_compromiso_id}/edit', [\App\Http\Controllers\TipoCompromisoController::class, 'edit'])->name('editar-tipo-compromiso');
    Route::get('/tipo-compromiso/{tipo_compromiso_id}/show', [\App\Http\Controllers\TipoCompromisoController::class, 'show'])->name('mostrar-tipo-compromiso');

    // Rutas para unidad de medida
    Route::view('unidad-medida', 'unidad-medida.index')->name('unidad-medida');
    Route::view('nuevo-unidad-medida', 'unidad-medida.create')->name('nuevo-unidad-medida');
    Route::get('/unidad-medida/{unidad_medida_id}/edit', [\App\Http\Controllers\UnidadMedidaController::class, 'edit'])->name('editar-unidad-medida');
    Route::get('/unidad-medida/{unidad_medida_id}/show', [\App\Http\Controllers\UnidadMedidaController::class, 'show'])->name('mostrar-unidad-medida');

    // Rutas para capturar los avances de los compromisos
    Route::view('avance-compromisos', 'dependencia-compromisos.index')->name('avance-compromisos');
    Route::view('nuevo-avance-compromisos', 'dependencia-compromisos.create')->name('nuevo-avance-compromisos');
    Route::get('/avance-compromiso/{dependencia_compromiso}/edit', [DependenciaCompromisoController::class, 'edit'])->name('editar-avance-compromiso');
    Route::get('/avance-compromiso/{dependencia_compromiso}/show', [DependenciaCompromisoController::class, 'show'])->name('mostrar-avance-compromiso');
    // Rutas para UXcompromisos
    Route::view('uxcompromisos', 'uxcompromisos.index')->name('uxcompromisos');
    // Rutas para Fichas de Impacto
    Route::get('/ficha-impacto/{dependencia_compromiso}/ficha', [DependenciaCompromisoController::class, 'ficha'])->name('mostrar-ficha-impacto');
});

require __DIR__ . '/auth.php';
