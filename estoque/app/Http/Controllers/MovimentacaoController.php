<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimentacao;

class MovimentacaoController extends Controller
{
    public function index()
    {
$movimentacoes = Movimentacao::with('produto')
    ->orderBy('created_at', 'desc')
    ->get();
        return view('movimentacoes.index', compact('movimentacoes'));
    }


}
?>