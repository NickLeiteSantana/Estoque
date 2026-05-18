@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 fade-in">

    <h2 class="mb-4">Lista de Produtos</h2>

    <!-- MENSAGENS -->
    @if(session('erro'))
        <div class="alert alert-danger">
            {{ session('erro') }}
        </div>
    @endif

    @if(session('sucesso'))
        <div class="alert alert-success">
            {{ session('sucesso') }}
        </div>
    @endif

    <!-- TOPO -->
    <div class="card p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <a href="{{ route('produtos.create') }}" class="btn btn-primary">
                + Novo Produto
            </a>

            <form method="GET" action="/produtos" class="d-flex gap-2">
                <input 
                    type="text" 
                    name="busca" 
                    class="form-control"
                    placeholder="Buscar produto..."
                >
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>

        </div>

    </div>

    <!-- TABELA -->
    <div class="card p-4">

        <div class="table-responsive">

            <table id="tabela" class="table align-middle" border="1px">

               <thead>
    <tr>
        <th title="Nome do produto cadastrado">📦 Produto</th>

        <th title="Quantidade disponível no estoque">
            📊 Qtd. em Estoque
        </th>

        <th title="Preço unitário do produto">
            💰 Preço (R$)
        </th>

        <th title="Situação atual do estoque">
            ⚠ Status do Estoque
        </th>

        <th title="Ações disponíveis para o produto">
            ⚙ Ações
        </th>
    </tr>
</thead>

                <tbody>

                    @foreach($produtos as $produto)

                        <tr>

                            <td>{{ $produto->nome }}</td>

                            <td>
                                <span class="{{ $produto->quantidade < 5 ? 'text-danger fw-bold' : '' }}">
                                    {{ $produto->quantidade }}
                                </span>
                            </td>

                            <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>

                            <td>
                                @if($produto->quantidade <= 0)
                                    <span class="badge bg-danger">Sem estoque</span>
                                @elseif($produto->quantidade <= 10)
                                    <span class="badge bg-warning text-dark">Baixo</span>
                                @else
                                    <span class="badge bg-success">OK</span>
                                @endif
                            </td>

                            <td>

                               <div class="d-flex gap-2 align-items-center flex-nowrap">

                                    <!-- EDITAR -->
                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>

                                    <!-- EXCLUIR -->
                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Excluir produto?')"
                                        >
                                            Excluir
                                        </button>
                                    </form>

                                    <!-- ENTRADA -->
                                    <form action="/produtos/{{ $produto->id }}/entrada" method="POST" class="d-flex gap-1">
                                        @csrf
                                        <input 
                                            type="number" 
                                            name="quantidade" 
                                            class="form-control form-control-sm"
                                            placeholder="Qtd"
                                            required
                                        >
                                        <button class="btn btn-success btn-sm">+</button>
                                    </form>

                                    <!-- SAÍDA -->
                                    <form action="/produtos/{{ $produto->id }}/saida" method="POST" class="d-flex gap-1">
                                        @csrf
                                        <input 
                                            type="number" 
                                            name="quantidade" 
                                            class="form-control form-control-sm"
                                            placeholder="Qtd"
                                            required
                                        >
                                        <button 
                                            class="btn btn-warning btn-sm"
                                            {{ $produto->quantidade <= 0 ? 'disabled' : '' }}
                                        >
                                            -
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection