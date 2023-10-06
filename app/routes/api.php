<?php

use App\Http\Controllers\CepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





// Rota GET para listar recursos em '/index'.
//id nao obrigatorio
Route::get('/index/{id?}', [CepController::class, 'index'])->name('api.index');

// Rota POST para criar um recurso em '/store'.
Route::post('/store', [CepController::class, 'store'])->name('api.store');

// Rota GET para editar um recurso com ID em '/edit/{id}'.
Route::get('/edit/{id}', [CepController::class, 'edit'])->name('api.edit');

// Rota DELETE para excluir um recurso com ID em '/delete/{id}'.
Route::delete('/delete/{id}', [CepController::class, 'delete'])->name('api.delete');

// Rota PUT para atualizar um recurso com ID em '/update/{id}'.
Route::put('/update/{id}', [CepController::class, 'update'])->name('api.update');
