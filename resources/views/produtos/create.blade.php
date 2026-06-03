@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 fade-in">

    <h2 class="mb-4">Cadastrar Produto</h2>

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
        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nome do Produto</label>
                    <input 
                        type="text" 
                        name="nome" 
                        class="form-control" 
                        placeholder="Ex: Refrigerante"
                        value="{{ old('nome') }}"
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
                        placeholder="Ex: 10.50"
                        value="{{ old('preco') }}"
                        required
                    >
                </div>

                <div class="col-md-12">
                    <label class="form-label">Descrição</label>
                    <input 
                        type="text" 
                        name="descricao" 
                        class="form-control" 
                        placeholder="Descrição do produto"
                        value="{{ old('descricao') }}"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Quantidade Inicial</label>
                    <input 
                        type="number" 
                        name="quantidade" 
                        class="form-control" 
                        placeholder="Ex: 100"
                        value="{{ old('quantidade') }}"
                        required
                    >
                </div>

            </div>

            <!-- BOTÕES -->
            <div class="mt-4 d-flex gap-2">

                <button type="submit" class="btn btn-primary">
                    Salvar Produto
                </button>

                <a href="/produtos" class="btn btn-secondary">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection