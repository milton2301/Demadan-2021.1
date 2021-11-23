<table class="table table-bordered">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
    </tr>
    <?php $__currentLoopData = $listaItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itens): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($itens->nome); ?></td>
        <td><?php echo e($itens->quantidade); ?></td>
        <td><?php echo e(number_format($itens->itemValor, 2, ',','.')); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
    Total da geral: R$ <?php echo e(number_format($total, 2, ',','.')); ?>


<?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/produtos/detalhes.blade.php ENDPATH**/ ?>