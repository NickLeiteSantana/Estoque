

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-4 fade-in">

    <h2 class="mb-4">Cadastrar Produto</h2>

    <div class="card p-4">

        <!-- ERROS -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- FORM -->
        <form action="<?php echo e(route('produtos.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nome do Produto</label>
                    <input 
                        type="text" 
                        name="nome" 
                        class="form-control" 
                        placeholder="Ex: Refrigerante"
                        value="<?php echo e(old('nome')); ?>"
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
                        value="<?php echo e(old('preco')); ?>"
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
                        value="<?php echo e(old('descricao')); ?>"
                        required
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Quantidade Inicial</label>
                    <input 
                        type="number" 
                        name="quantidade" 
                        class="form-control" 
                        placeholder="Ex: 100"
                        value="<?php echo e(old('quantidade')); ?>"
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\projetos\estoque\estoque\resources\views/produtos/create.blade.php ENDPATH**/ ?>