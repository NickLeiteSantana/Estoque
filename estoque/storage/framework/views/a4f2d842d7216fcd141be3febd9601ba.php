

<?php $__env->startSection('content'); ?>

<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 90vh;">

    <div class="card shadow p-4 fade-in" style="width: 100%; max-width: 420px; border-radius: 16px;">

        <div class="text-center mb-4">
            <h3 class="fw-bold">Sistema de Estoque</h3>
            <p class="text-muted">Faça login para continuar</p>
        </div>

        <!-- ERROS -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <!-- FORM -->
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="<?php echo e(old('email')); ?>" 
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
        <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-primary w-100">
            Criar conta
        </a>

        <!-- ESQUECI SENHA -->
        <?php if(Route::has('password.request')): ?>
            <div class="text-center mt-3">
                <a href="<?php echo e(route('password.request')); ?>" class="text-muted">
                    Esqueceu a senha?
                </a>
            </div>
        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\projetos\estoque\estoque\resources\views/auth/login.blade.php ENDPATH**/ ?>