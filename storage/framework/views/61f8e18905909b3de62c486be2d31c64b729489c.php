<?php $__env->startSection('title','Detalhes do ' .$produtos->nome); ?>

<?php $__env->startSection('content'); ?>

<div id="container prod-container" class="col-md-10 offset-md-1 animate__animated animate__fadeInLeft">
    <p></p>
    <div id="cards-container" class="row-card">
            <div id="cards" class="card col-md-5">
                <img src="/img/imagensRoupas/<?php echo e($produtos->imagem); ?>" alt="<?php echo e($produtos->nome); ?>">
            </div>
            <div class="col-md-7 desc">
                <h1><?php echo e($produtos->nome); ?></h1>
                <p>Marca: <?php echo e($produtos->marca); ?></p>
                <p>Tamanho: <?php echo e($produtos->tamanho); ?></p>
                <p>Cor: <?php echo e($produtos->cor); ?></p>
                <p>Descrições: <?php echo e($produtos->descricao); ?></p>
                <p><strong><h5>R$ <?php echo e(number_format($produtos->valor, 2,',','.')); ?></h5></strong></p>
                <p class="card-title"><i>Em até 5X de R$ <?php echo e(number_format($parcelas = $produtos->valor / 5, 2,',','.' )); ?></i></p>
                
                <div class="container">
                    <div>
                        <form action="" method="POST">
                            <?php echo csrf_field(); ?>
                            <a href="<?php echo e(route('adicionar', ['id' => $produtos->id])); ?>" class="btn btn-primary btn-prod">Adicionar <i class="fas fa-shopping-cart fa-lg"></i></a>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/produtos/produto.blade.php ENDPATH**/ ?>