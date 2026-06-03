@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 fade-in">

    <h2 class="mb-4">Editar Produto</h2>

    <div class="card p-4">

        <!-- ERROS -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nome do Produto</label>
                    <input 
                        type="text" 
                        name="nome" 
                        class="form-control"
                        value="{{ old('nome', $produto->nome) }}"
                        required
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Preço</label>
                    <input 
                        type="number"
                        step="0.01"
                        name="preco" 
                        class="form-control"
                        value="{{ old('preco', $produto->preco) }}"
                        required
                    >
                </div>

                <div class="col-md-12">
                    <label class="form-label">Descrição</label>
                    <input 
                        type="text" 
                        name="descricao" 
                        class="form-control"
                        value="{{ old('descricao', $produto->descricao) }}"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Quantidade</label>
                    <input 
                        type="number" 
                        name="quantidade" 
                        class="form-control"
                        value="{{ old('quantidade', $produto->quantidade) }}"
                        required
                    >
                </div>

            </div>

            <!-- BOTÕES -->
            <div class="mt-4 d-flex gap-2">

                <button type="submit" class="btn btn-primary">
                    Atualizar Produto
                </button>

                <a href="/produtos" class="btn btn-secondary">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection