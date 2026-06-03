@extends('layouts.app')

@section('content')

<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 90vh;">

    <div class="card shadow p-4 fade-in" style="width: 100%; max-width: 420px; border-radius: 16px;">

        <div class="text-center mb-4">
            <h3 class="fw-bold">Sistema de Estoque</h3>
            <p class="text-muted">Faça login para continuar</p>
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
        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            <!-- LEMBRAR -->
            <div class="form-check mb-3">
                <input type="checkbox" name="remember" class="form-check-input">
                <label class="form-check-label">Lembrar de mim</label>
            </div>

            <!-- BOTÃO LOGIN -->
            <button class="btn btn-primary w-100">
                Entrar
            </button>

        </form>

        <!-- DIVISOR -->
        <div class="text-center my-3 text-muted">
            ou
        </div>

        <!-- BOTÃO CADASTRO -->
        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">
            Criar conta
        </a>

        <!-- ESQUECI SENHA -->
        @if (Route::has('password.request'))
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-muted">
                    Esqueceu a senha?
                </a>
            </div>
        @endif

    </div>

</div>

@endsection