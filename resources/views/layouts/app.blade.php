<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Estoque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid px-4">
        <x-alerts />
        @if ($errors->any())
    <div class="alert alert-danger shadow-sm">
        <i class="bi bi-x-circle"></i>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="/dashboard">
            📦 EstoquePro
        </a>

        <!-- Botão mobile -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <!-- MENU ESQUERDA -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('produtos*') ? 'active' : '' }}" href="/produtos">
                        <i class="bi bi-box-seam"></i> Produtos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('movimentos') ? 'active' : '' }}" href="/movimentos">
                        <i class="bi bi-clock-history"></i> Histórico
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('relatorio*') ? 'active' : '' }}" href="/relatorio/baixo_estoque">
                        <i class="bi bi-bar-chart"></i> Relatório
                    </a>
                </li>

            </ul>

            <!-- MENU DIREITA (USUÁRIO) -->
            @auth
            <ul class="navbar-nav">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i>
                        {{ auth()->user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="/profile">
                                <i class="bi bi-gear"></i> Perfil
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">
        Sair
    </button>
</form>
                        </li>

                    </ul>

                </li>

            </ul>
            @endauth

        </div>
    </div>
</nav>
<div class="container mt-4">

    @yield('content')

</div>
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => el.remove());
    }, 3000);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>