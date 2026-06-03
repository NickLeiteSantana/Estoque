

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-4 fade-in">

    <h2 class="mb-4">Lista de Produtos</h2>

    <!-- MENSAGENS -->
    <?php if(session('erro')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('erro')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('sucesso')): ?>
        <div class="alert alert-success">
            <?php echo e(session('sucesso')); ?>

        </div>
    <?php endif; ?>

    <!-- TOPO -->
    <div class="card p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <a href="<?php echo e(route('produtos.create')); ?>" class="btn btn-primary">
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

                    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td><?php echo e($produto->nome); ?></td>

                            <td>
                                <span class="<?php echo e($produto->quantidade < 5 ? 'text-danger fw-bold' : ''); ?>">
                                    <?php echo e($produto->quantidade); ?>

                                </span>
                            </td>

                            <td>R$ <?php echo e(number_format($produto->preco, 2, ',', '.')); ?></td>

                            <td>
                                <?php if($produto->quantidade <= 0): ?>
                                    <span class="badge bg-danger">Sem estoque</span>
                                <?php elseif($produto->quantidade <= 10): ?>
                                    <span class="badge bg-warning text-dark">Baixo</span>
                                <?php else: ?>
                                    <span class="badge bg-success">OK</span>
                                <?php endif; ?>
                            </td>

                            <td>

                               <div class="d-flex gap-2 align-items-center flex-nowrap">

                                    <!-- EDITAR -->
                                    <a href="<?php echo e(route('produtos.edit', $produto->id)); ?>" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>

                                    <!-- EXCLUIR -->
                                    <form action="<?php echo e(route('produtos.destroy', $produto->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button 
                                            type="submit" 
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Excluir produto?')"
                                        >
                                            Excluir
                                        </button>
                                    </form>

                                    <!-- ENTRADA -->
                                    <form action="/produtos/<?php echo e($produto->id); ?>/entrada" method="POST" class="d-flex gap-1">
                                        <?php echo csrf_field(); ?>
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
                                    <form action="/produtos/<?php echo e($produto->id); ?>/saida" method="POST" class="d-flex gap-1">
                                        <?php echo csrf_field(); ?>
                                        <input 
                                            type="number" 
                                            name="quantidade" 
                                            class="form-control form-control-sm"
                                            placeholder="Qtd"
                                            required
                                        >
                                        <button 
                                            class="btn btn-warning btn-sm"
                                            <?php echo e($produto->quantidade <= 0 ? 'disabled' : ''); ?>

                                        >
                                            -
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\gabri\OneDrive\Documentos\estoque\estoque\resources\views/produtos/index.blade.php ENDPATH**/ ?>