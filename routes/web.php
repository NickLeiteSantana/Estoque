<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\RelatorioController;



Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('produtos', ProdutoController::class);
    Route::get('/movimentos', [MovimentacaoController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/produtos/{id}/entrada', [ProdutoController::class, 'entrada'])->name('produtos.entrada');
    Route::post('/produtos/{id}/saida', [ProdutoController::class, 'saida'])->name('produtos.saida');
    Route::get('/relatorio/baixo_estoque', [RelatorioController::class, 'baixoEstoque']);
    Route::get('/relatorio/movimentacoes', [RelatorioController::class, 'movimentacoes']);
    Route::get('/relatorio/pdf', [RelatorioController::class, 'pdf'])
    ->name('relatorio.pdf');

});

require __DIR__.'/auth.php';




