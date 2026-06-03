<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema de Estoque</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
background: linear-gradient(135deg,#4e73df,#1cc88a);
min-height:100vh;
color:white;
}

.hero{
padding:120px 20px;
text-align:center;
}

.features{
background:white;
color:#333;
padding:60px 20px;
border-radius:30px 30px 0 0;
margin-top:60px;
}

.feature-icon{
font-size:40px;
margin-bottom:15px;
color:#4e73df;
}

</style>

</head>

<body>

<div class="container">

<div class="hero">

<h1 class="display-4 fw-bold mb-3">
📦 Sistema de Estoque
</h1>

<p class="lead mb-4">
Controle seus produtos, registre entradas e saídas e acompanhe tudo em um dashboard simples.
</p>

<?php if(auth()->guard()->check()): ?>

<a href="/dashboard" class="btn btn-dark btn-lg">
Ir para o Dashboard
</a>

<?php else: ?>

<div class="d-flex justify-content-center gap-3">

<a href="<?php echo e(route('login')); ?>" class="btn btn-light btn-lg">
<i class="bi bi-box-arrow-in-right"></i> Login
</a>

<a href="<?php echo e(route('register')); ?>" class="btn btn-success btn-lg">
<i class="bi bi-person-plus"></i> Cadastro
</a>

</div>

<?php endif; ?>

</div>

</div>

<div class="features">

<div class="container">

<h2 class="text-center mb-5">Funcionalidades</h2>

<div class="row text-center">

<div class="col-md-3 mb-4">
<div class="feature-icon">
<i class="bi bi-box"></i>
</div>
<h5>Cadastro de Produtos</h5>
<p>Cadastre e gerencie seus produtos facilmente.</p>
</div>

<div class="col-md-3 mb-4">
<div class="feature-icon">
<i class="bi bi-arrow-down-up"></i>
</div>
<h5>Controle de Movimentações</h5>
<p>Registre entradas e saídas do estoque.</p>
</div>

<div class="col-md-3 mb-4">
<div class="feature-icon">
<i class="bi bi-clock-history"></i>
</div>
<h5>Histórico Completo</h5>
<p>Acompanhe todas as movimentações feitas.</p>
</div>

<div class="col-md-3 mb-4">
<div class="feature-icon">
<i class="bi bi-bar-chart"></i>
</div>
<h5>Dashboard</h5>
<p>Visualize gráficos e dados do estoque.</p>
</div>

</div>

</div>

</div>

</body>
</html><?php /**PATH D:\projetos\estoque\estoque\resources\views/welcome.blade.php ENDPATH**/ ?>