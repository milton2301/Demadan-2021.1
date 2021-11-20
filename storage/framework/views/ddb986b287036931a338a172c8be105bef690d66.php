 

<?php $__env->startSection('title','Pricipal'); ?> 


<?php $__env->startSection('content'); ?> 

<div id="prod-container" class="col-md-12 animate__animated animate__fadeInRight">

    <?php if($search): ?>
        <h4> Todos os resultados da busca por <strong><?php echo e($search); ?></strong></h4>
    <?php elseif($filtroTipo): ?>
    <h4>Filtrando pelo Tipo <strong><?php echo e($filtroTipo); ?></strong></h4>
    <?php elseif($filtroMarca): ?>
    <h4>Filtrando pela Marca: <strong><?php echo e($filtroMarca); ?></strong></h4>
    <?php elseif($filtroTamanho): ?>
    <h4>Filtrando pelo Tamanho: <strong><?php echo e($filtroTamanho); ?></strong></h4>
    <?php else: ?>
    <h3>Todos os nossos produtos</h3>
    <?php endif; ?>

    <div id="cards-container" class="row">
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="card" class="card col-md-4">
                <img src="/img/imagensRoupas/<?php echo e($produto->imagem); ?>" alt="<?php echo e($produto->nome); ?>">
                <div id="cards" class="card-body">
                    <p class="card-title"><?php echo e($produto->nome); ?></p>
                    <p class="card-title">Marca: <?php echo e($produto->marca); ?></p>
                    <p class="card-title">Valor: R$ <?php echo e(number_format($produto->valor, 2, ',','.')); ?></p>
                    <a href="<?php echo e(route('ver_produto',$produto->id)); ?>" class="btn btn-primary">Ver mais <i class="fas fa-info-circle fa-lg"></i></a>
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

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/index.blade.php ENDPATH**/ ?>