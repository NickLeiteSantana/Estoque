

<?php $__env->startSection('content'); ?>

<?php if($errors->updatePassword->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->updatePassword->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(session('status')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?php echo e(session('status')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

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

                <p><strong>Nome:</strong> <?php echo e(auth()->user()->name); ?></p>
                <p><strong>Email:</strong> <?php echo e(auth()->user()->email); ?></p>

                <p><strong>Conta criada em:</strong>
                    <?php echo e(auth()->user()->created_at->format('d/m/Y')); ?>

                </p>

            </div>
        </div>

        <!-- ALTERAR SENHA -->
        <div class="col-md-6">
            <div class="card shadow p-4">

                <h5>Alterar Senha</h5>
                        

               <form method="POST" action="<?php echo e(route('password.update')); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\projetos\estoque\estoque\resources\views/profile/edit.blade.php ENDPATH**/ ?>