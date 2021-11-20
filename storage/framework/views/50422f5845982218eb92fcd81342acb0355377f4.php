 

<?php $__env->startSection('title','Pricipal'); ?> 


<?php $__env->startSection('content'); ?> 

<div class="offset-md-9"><h5>Painel Administrativo</h5></div>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a href="<?php echo e(route('cadastrar')); ?>" class="nav-link">Cadastrar Produto  <i class="far fa-plus-square fa-lg"></i></a>
        </div>
        <div class="col-3">
            <a href="<?php echo e(route('ver_estoque')); ?>" class="nav-link">Estoque <i class="fas fa-database"></i></a>
        </div>
        <div class="col-3">
            <a href="<?php echo e(route('pedidos_pendentes')); ?>" class="nav-link">Pedidos não atendidos  <i class="fas fa-shopping-basket"></i></a>
        </div>
        <div class="col-3">
            <a href="<?php echo e(route('pedidos_finalizados')); ?>" class="nav-link">Pedidos atendidos  <i class="fas fa-cash-register"></i></a>
        </div>
    </div>
</div>

<div id="prod-container" class="col-md-12 animate__animated animate__fadeInRight">
    <?php if(isset($search)): ?>
        <h4> Todos os resultados da busca por <strong><?php echo e($search); ?></strong></h4>
    <?php else: ?>
    <h3>Todos os produtos</h3>
    <?php endif; ?>
    <div id="cards-container" class="row">
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="card" class="card col-md-4">
                <img src="/img/imagensRoupas/<?php echo e($produto->imagem); ?>" alt="<?php echo e($produto->nome); ?>">
                <div id="cards" class="card-body">
                    <p class="card-title"><?php echo e($produto->nome); ?></p>
                    <p class="card-title">Marca: <?php echo e($produto->marca); ?></p>
                    <p class="card-title">Valor: R$ <?php echo e(number_format($produto->valor, 2, ',','.')); ?></p>
                    <a href="<?php echo e(route('ver_prod',$produto->id)); ?>" class="btn btn-primary">Ver detalhes do produto <i class="fas fa-info-circle fa-lg"></i></a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($produtos) == 0 && $search): ?>
            <p>Não foi possível encontrar nenhum resultado com <?php echo e($search); ?>!</p>
            <p><a href="/" class="btn btn-primary">Voltar</a></p>
        <?php elseif(count($produtos)== 0): ?>
            <p>Não há produto disponível</p>
        <?php endif; ?>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layout.layoutAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/indexAdmin.blade.php ENDPATH**/ ?>