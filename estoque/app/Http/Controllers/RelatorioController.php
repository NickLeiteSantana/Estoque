<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produto;

class RelatorioController extends Controller
{
    public function baixoEstoque(Request $request)
    {
        $mes = $request->mes;

        $produtos = DB::table('produtos')
            ->leftJoin('movimentacoes', 'produtos.id', '=', 'movimentacoes.produto_id')
            ->select(
                'produtos.nome',
                'produtos.quantidade',

                DB::raw("SUM(CASE WHEN movimentacoes.tipo = 'entrada' THEN movimentacoes.quantidade ELSE 0 END) as total_entrada"),
                DB::raw("SUM(CASE WHEN movimentacoes.tipo = 'saida' THEN movimentacoes.quantidade ELSE 0 END) as total_saida"),

                DB::raw("MAX(CASE WHEN movimentacoes.tipo = 'entrada' THEN movimentacoes.created_at END) as ultima_entrada"),
                DB::raw("MAX(CASE WHEN movimentacoes.tipo = 'saida' THEN movimentacoes.created_at END) as ultima_saida")
            )
            ->when($mes, function ($query) use ($mes) {
                $query->whereMonth('movimentacoes.created_at', $mes);
            })
            ->groupBy('produtos.id', 'produtos.nome', 'produtos.quantidade')
            ->get();

        return view('relatorio.baixo_estoque', compact('produtos', 'mes'));
    }

    public function movimentacoes()
    {
        $movimentacoes = \App\Models\Movimentacao::with('produto')
            ->latest()
            ->get();

        return view('relatorio.movimentacoes', compact('movimentacoes'));
    }

    public function pdf()
    {
        $produtos = Produto::all();

        $estoqueBaixo = $produtos->where('quantidade', '>', 0)
                                 ->where('quantidade', '<=', 10)
                                 ->count();

        $semEstoque = $produtos->where('quantidade', '<=', 0)
                               ->count();

        $pdf = Pdf::loadView('relatorio.pdf', compact(
            'produtos',
            'estoqueBaixo',
            'semEstoque'
        ));

        return $pdf->download('relatorio_estoque.pdf');
    }
}