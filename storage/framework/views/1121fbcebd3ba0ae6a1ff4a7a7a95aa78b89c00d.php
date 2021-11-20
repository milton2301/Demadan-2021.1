<?php $__env->startSection('title','Detalhes do ' .$produtos->nome); ?>

<?php $__env->startSection('content'); ?>

<div id="container prod-container" class="col-md-10 offset-md-1 animate__animated animate__fadeInLeft">
    <p></p>
    <div id="cards-container" class="row-card">
            <div id="cards" class="card col-md-5">
                <img src="/img/imagensRoupas/<?php echo e($produtos->imagem); ?>" alt="<?php echo e($produtos->nome); ?>">
            </div>
            <div class="col-md-5 desc">
                <h1><?php echo e($produtos->nome); ?></h1>
                <p>R$: <?php echo e(number_format($produtos->valor, 2, ',','.')); ?></p>
                <p>Marca: <?php echo e($produtos->marca); ?></p>
                <p>Tamanho: <?php echo e($produtos->tamanho); ?></p>
                <p>Cor: <?php echo e($produtos->cor); ?></p>
                <p>Descrições: <?php echo e($produtos->descricao); ?></p>
                <p class="card-title"><i>Em até 5X de R$ <?php echo e(number_format( $parcelas = $produtos->valor / 5, 2, ',','.')); ?> s/juros no cartão da loja</i></p>
                
                <div class="container">
                        <div class="col-4">
                            <a href="<?php echo e(route('editar',$produtos->id)); ?>" class="btn btn-info edit-btn btn-prod">Editar <i class="fas fa-edit"></i></a>
                        </div>
                        <div class="col-4">
                            <form action="/admin/<?php echo e($produtos->id); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?> <br>
                                <button type="submit" class="btn btn-danger delete-btn btn-prod">Excluir item <i class="fas fa-trash-alt fa-lg"></i></button>
                            </form>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script>

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layoutAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/produto.blade.php ENDPATH**/ ?>