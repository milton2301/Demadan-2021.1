<?php $__env->startSection('title','Editando ' .$produto->nome); ?>


<?php $__env->startSection('content'); ?>


<div class="container-fluid">

    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: <?php echo e($produto->nome); ?></h1>

        <form action="/admin/update/<?php echo e($produto->id); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="title">Tipo</label>
                <input name="tipo" id="tipo"  class="form-control" value="<?php echo e($produto->tipo); ?>">
            </div>
            <div class="form-group">
                <label for="title">Nome da peça</label>
                <input name="nome" id="nome"  class="form-control" value="<?php echo e($produto->nome); ?>">
            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <textarea name="descricao" id="descricao"  class="form-control"><?php echo e($produto->descricao); ?></textarea>
            </div>
            <div class="form-group">
                <label for="title">Tamanho</label>
                <select name="tamanho" id="tamanho" class="form-control">
                    <?php if($produto->tamanho == 'G'): ?>
                        <option value="<?php echo e($produto->tamanho); ?>">Grande</option>
                    <?php elseif($produto->tamanho == 'M'): ?>
                        <option value="<?php echo e($produto->tamanho); ?>">Médio</option>
                    <?php elseif($produto->tamanho == 'P'): ?>
                    <option value="<?php echo e($produto->tamanho); ?>">Pequena</option>
                    <?php endif; ?>
                    <?php if($produto->tamanho == 'G'): ?>
                        <option value="M">Médio</option>
                        <option value="P">Pequena</option>
                    <?php elseif($produto->tamanho == 'M'): ?>
                        <option value="G">Grande</option>
                        <option value="P">Pequena</option>
                    <?php elseif($produto->tamanho == 'P'): ?>
                        <option value="G">Grande</option>
                        <option value="M">Médio</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Cor</label>
                <input name="cor" id="cor"  class="form-control" value="<?php echo e($produto->cor); ?>">
            </div>
            <div class="form-group">
                <label for="title">Marca</label>
                <input name="marca" id="marca" class="form-control" value="<?php echo e($produto->marca); ?>">
            </div>
            <div class="form-group">
                <label for="title">Valor</label>
                <input type="text" name="valor" id="valor" class="form-control" value="<?php echo e($produto->valor); ?>">
            </div>
            <div class="form-group">
                <label for="title">Trocar imagem</label>
                <input type="file" name="imagem" id="imagem" class="form-control">
                <img src="/img/imagensRoupas/<?php echo e($produto->imagem); ?>" alt="<?php echo e($produto->nome); ?>" class="img-preview">
                <p>Imagem atual</p>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar <i class="fas fa-sync fa-lg"></i></button>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/edit.blade.php ENDPATH**/ ?>