<?php

use App\Http\Controllers\IngredientesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/inicio', [IngredientesController::class, 'todosIngredientes'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/ingredientes-a-vencer', [IngredientesController::class, 'ingredientesProximosAVencer'])->name('ingredientes.avencer');
    Route::get('/ingredientes-adicionar', [IngredientesController::class, 'ingredientesAdicionar'])->name('ingredientes.adicionar');
    Route::get('/ingredientes-encomendados', [IngredientesController::class, 'ingredientesEncomendados'])->name('ingredientes.encomendados');
    Route::get('/ingredientes-faltantes', [IngredientesController::class, 'ingredientesFaltantes'])->name('ingredientes.faltantes');
    Route::get('/ingredientes-remover', [IngredientesController::class, 'ingredientesRemover'])->name('ingredientes.remover');
    Route::post('/criar', [IngredientesController::class, 'criar'])->name('ingredientes.criar');
    Route::post('/remover/{id}', [IngredientesController::class, 'excluir'])->name('ingredientes.excluir');
    Route::get('/ajudar', function() {
        return view('ajuda');
    })->name('ajuda');
    Route::get('/contatar-fornecedor', function() {
        return view('contatar-fornecedor');
    })->name('contatar.fornecedor');
});

require __DIR__.'/auth.php';
