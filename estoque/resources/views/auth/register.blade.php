@extends('layouts.app')

@section('content')

<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 90vh;">

    <div class="card shadow p-4 fade-in" style="width: 100%; max-width: 450px; border-radius: 16px;">

        <div class="text-center mb-4">
            <h3 class="fw-bold">Criar Conta</h3>
            <p class="text-muted">Cadastre-se para acessar o sistema</p>
        </div>

        <!-- ERROS -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NOME -->
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name') }}" 
                    required
                >
            </div>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    required
                >
            </div>

            <!-- SENHA -->
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    required
                >
            </div>

            <!-- CONFIRMAR SENHA -->
            <div class="mb-3">
                <label class="form-label">Confirmar Senha</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    required
                >
            </div>

            <!-- BOTÃO -->
            <button class="btn btn-primary w-100">
                Criar Conta
            </button>

            <!-- LOGIN -->
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-muted">
                    Já tem conta? Entrar
                </a>
            </div>

        </form>

    </div>

</div>

@endsection