<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DesafioController; // <--- Importante: Importar seu controller
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas da Aplicação
|--------------------------------------------------------------------------
*/

// 1. Rota da Home (Usa o seu Controller para carregar a lista)
Route::get('/', [DesafioController::class, 'index'])->name('home');

// 2. Rotas do CRUD (Cria topic.store, topic.update, topic.destroy, etc.)
// Essa é a linha que estava faltando para o erro sumir!
Route::resource('topic', DesafioController::class)->except(['index', 'show', 'create'])->middleware(['auth']);


/*
|--------------------------------------------------------------------------
| Rotas do Breeze (Login / Dashboard)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DesafioController::class, 'index'])->name('home')
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';