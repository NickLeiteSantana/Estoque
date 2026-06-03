<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        color: #1f2937;
        font-size: 12px;
        margin: 20px;
    }

    /* HEADER */
    .header {
        display: flex;
        justify-content: space-between;
        border-bottom: 2px solid #4f46e5;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .logo {
        font-size: 18px;
        font-weight: bold;
        color: #4f46e5;
    }

    .company {
        text-align: right;
        font-size: 11px;
        color: #6b7280;
    }

    /* TÍTULO */
    .title {
        text-align: center;
        margin: 20px 0;
    }

    .title h2 {
        margin: 0;
        font-size: 18px;
    }

    /* RESUMO */
   .summary {
    width: 100%;
    text-align: center;
}

.card {
    display: inline-block;
    width: 22%;
    margin: 5px;
    vertical-align: top;
}

    .card h4 {
        margin: 0;
        font-size: 12px;
        color: #6b7280;
    }

    .card p {
        margin: 5px 0 0;
        font-size: 16px;
        font-weight: bold;
    }

    /* TABELA */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
    background: #0f172a; /* mais sofisticado */
        color: white;
    }

    th, td {
        padding: 10px;
        border: 1px solid #e5e7eb;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background: #f9fafb;
    }

    /* STATUS */
    .ok { color: #10b981; font-weight: bold; }
    .low { color: #f59e0b; font-weight: bold; }
    .danger { color: #ef4444; font-weight: bold; }

    /* FOOTER */
    .footer {
        margin-top: 30px;
        text-align: center;
        font-size: 10px;
        color: #9ca3af;
        border-top: 1px solid #e5e7eb;
        padding-top: 10px;
    }
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <div class="logo">EstoquePro • Sistema de Gestão</div>

    <div class="company">
        Relatório gerado em:<br>
        <?php echo e(date('d/m/Y H:i')); ?>

    </div>
</div>

<!-- TÍTULO -->
<div class="title">
    <h2>Relatório de Estoque</h2>
</div>

<!-- RESUMO EXECUTIVO -->
<div class="summary">
    <div class="card">
        <h4>Total Produtos</h4>
        <p><?php echo e($produtos->count()); ?></p>
    </div>

    <div class="card">
        <h4>Total Itens</h4>
        <p><?php echo e($produtos->sum('quantidade')); ?></p>
    </div>

    <div class="card">
        <h4>Estoque Baixo</h4>
        <p>
            <?php echo e($estoqueBaixo); ?>

        </p>
    </div>

    <div class="card">
        <h4>Sem Estoque</h4>
        <p>
            <?php echo e($semEstoque); ?>

        </p>
    </div>
</div>
<hr style="margin: 20px 0; border: none; border-top: 1px solid #e5e7eb;">
<!-- TABELA -->
<table>
    <thead>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($produto->nome); ?></td>

            <td><?php echo e($produto->quantidade); ?></td>

            <td>
                <?php if($produto->quantidade <= 0): ?>
                    <span class="danger">Sem estoque</span>
                <?php elseif($produto->quantidade <= 10): ?>
                    <span class="low">Baixo</span>
                <?php else: ?>
                    <span class="ok">OK</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<!-- FOOTER -->
<div class="footer">
    Sistema EstoquePro • Documento gerado automaticamente
</div>

</body>
</html><?php /**PATH D:\projetos\estoque\estoque\resources\views/relatorio/pdf.blade.php ENDPATH**/ ?>