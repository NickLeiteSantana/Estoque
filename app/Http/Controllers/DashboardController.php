<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;

class DashboardController extends Controller
{
  public function index()
{
    $totalProdutos = Produto::count();

    $totalEstoque = Produto::sum('quantidade');

    $entradas = Movimentacao::where('tipo', 'entrada')->sum('quantidade');

    $saidas = Movimentacao::where('tipo', 'saida')->sum('quantidade');

    $estoqueBaixo = Produto::where('quantidade', '<=', 5)->get();

    $ultimasMovimentacoes = Movimentacao::with('produto')
        ->latest()
        ->take(5)
        ->get();

    return view('painel', compact(
        'totalProdutos',
        'totalEstoque',
        'entradas',
        'saidas',
        'estoqueBaixo',
        'ultimasMovimentacoes'
    ));
}
}