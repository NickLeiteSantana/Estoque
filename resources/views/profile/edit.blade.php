@extends('layouts.app')

@section('content')

@if ($errors->updatePassword->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->updatePassword->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if(alert) alert.remove();
    }, 3000);
</script>
    

<div class="container">

    <h2 class="mb-4">👤 Meu Perfil</h2>

    <div class="row">

        <!-- DADOS DO USUÁRIO -->
        <div class="col-md-6">
            <div class="card shadow p-4">

                <h5>Informações</h5>

                <p><strong>Nome:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

                <p><strong>Conta criada em:</strong>
                    {{ auth()->user()->created_at->format('d/m/Y') }}
                </p>

            </div>
        </div>

        <!-- ALTERAR SENHA -->
        <div class="col-md-6">
            <div class="card shadow p-4">

                <h5>Alterar Senha</h5>
                        

               <form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Senha atual</label>
        <input type="password" name="current_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nova senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Confirmar nova senha</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button class="btn btn-primary">Atualizar senha</button>
</form>
            </div>
        </div>

    </div>

</div>

@endsection