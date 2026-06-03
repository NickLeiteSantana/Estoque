

<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard de Relatório</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .status-ok {
            color: green;
            font-weight: bold;
        }

        .status-baixo {
            color: red;
            font-weight: bold;
        }

        .status-zero {
            color: darkred;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">📊 Dashboard de Relatório</h2>

    <!-- CARDS -->
   <div class="row mb-4 justify-content-center">

    <div class="col-md-2">
        <div class="card shadow p-3 text-center">
            <h6>Total Produtos</h6>
            <h3><?php echo e($produtos->count()); ?></h3>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card shadow p-3 text-center">
            <h6>Total Entradas</h6>
            <h3><?php echo e($produtos->sum('total_entrada')); ?></h3>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card shadow p-3 text-center">
            <h6>Total Saídas</h6>
            <h3><?php echo e($produtos->sum('total_saida')); ?></h3>
        </div>
    </div>

</div>

    <!-- FILTRO -->
    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="number" name="mes" class="form-control" min="1" max="12" placeholder="Filtrar por mês" value="<?php echo e($mes); ?>">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- BOTÃO PDF -->
    <a href="<?php echo e(route('relatorio.pdf')); ?>" class="btn btn-danger mb-4">
        Gerar PDF
    </a>

    <!-- TABELA -->
    <div class="card shadow p-3">

        <table class="table table-hover text-center">

            <thead class="table-dark">
                <tr>
                    <th>Produto</th>
                    <th>Qtd Atual</th>
                    <th>Entradas</th>
                    <th>Saídas</th>
                    <th>Última Entrada</th>
                    <th>Última Saída</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td><?php echo e($p->nome); ?></td>

                    <td><?php echo e($p->quantidade); ?></td>

                    <td><?php echo e($p->total_entrada ?? 0); ?></td>

                    <td><?php echo e($p->total_saida ?? 0); ?></td>

                    <td>
                        <?php echo e($p->ultima_entrada ? \Carbon\Carbon::parse($p->ultima_entrada)->format('d/m/Y') : '-'); ?>

                    </td>

                    <td>
                        <?php echo e($p->ultima_saida ? \Carbon\Carbon::parse($p->ultima_saida)->format('d/m/Y') : '-'); ?>

                    </td>

                    <td>
                        <?php if($p->quantidade == 0): ?>
                            <span class="status-zero">Sem estoque</span>
                        <?php elseif($p->quantidade < 10): ?>
                            <span class="status-baixo">Baixo</span>
                        <?php else: ?>
                            <span class="status-ok">OK</span>
                        <?php endif; ?>
                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>
                    <td colspan="7">Nenhum produto encontrado</td>
                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\projetos\estoque\estoque\resources\views/relatorio/baixo_estoque.blade.php ENDPATH**/ ?>