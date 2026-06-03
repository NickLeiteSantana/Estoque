<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->busca;

        if ($busca) {
            $produtos = Produto::where('nome', 'like', '%' . $busca . '%')->get();
        } else {
            $produtos = Produto::all();
        }

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|max:500',
            'quantidade' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto criado com sucesso!');
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto excluído com sucesso!');
    }

    public function edit($id)
{
    $produto = Produto::findOrFail($id);

    return view('produtos.edit', compact('produto'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'quantidade' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0'
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        return redirect()->route('produtos.index')
            ->with('sucesso', 'Produto atualizado!');
    }

    public function entrada(Request $request, $id)
    {
        $request->validate([
            'quantidade' => 'required|numeric|min:1'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->quantidade += $request->quantidade;
        $produto->save();

        // ✅ REGISTRA MOVIMENTAÇÃO
        Movimentacao::create([
            'produto_id' => $produto->id,
            'tipo' => 'entrada',
            'quantidade' => $request->quantidade
        ]);

        return back()->with('sucesso', 'Entrada realizada!');
    }

    public function saida(Request $request, $id)
    {
        $request->validate([
            'quantidade' => 'required|numeric|min:1'
        ]);

        $produto = Produto::findOrFail($id);

        if ($request->quantidade > $produto->quantidade) {
            return back()->with('erro', 'Estoque insuficiente!');
        }

        $produto->quantidade -= $request->quantidade;
        $produto->save();

        // ✅ REGISTRA MOVIMENTAÇÃO
        Movimentacao::create([
            'produto_id' => $produto->id,
            'tipo' => 'saida',
            'quantidade' => $request->quantidade
        ]);

        return back()->with('sucesso', 'Saída realizada!');
    }

    public function movimentacoes()
    {
        $movimentacoes = Movimentacao::with('produto')->latest()->get();

        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function dashboard()
    {
        $totalProdutos = Produto::count();
        $totalEstoque = Produto::sum('quantidade');

        $entradas = Movimentacao::where('tipo', 'entrada')->sum('quantidade');
        $saidas = Movimentacao::where('tipo', 'saida')->sum('quantidade');

        $estoqueBaixo = Produto::where('quantidade', '<=', 10)->count();

        return view('painel', compact(
            'totalProdutos',
            'totalEstoque',
            'entradas',
            'saidas',
            'estoqueBaixo'
        ));
    }
}