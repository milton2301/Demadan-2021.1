 

<?php $__env->startSection('title','Estoque'); ?> 

<?php $__env->startSection('content'); ?> 

<div class="container-fluid">
    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="text" value="<?php echo e($prod->nome); ?>">
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layout.layoutAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/estoque.blade.php ENDPATH**/ ?>