<?php $__env->startSection('title','Atendendo Pedidos'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Atendendo Cliente <strong><?php echo e($usuario->name); ?></strong></h1>


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

        <form action="<?php echo e(route('pedidos_status',$pedido->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="title">Status do Pedidos</label>
                <select name="status" id="status" class="form-control">
                    <option value="<?php echo e($pedido->status); ?>">PENDENTE</option>
                    <option value="FIN">FINALIZAR</option>
                    <option value="CAN">CANCELAR</option>
                </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Atualizar <i class="fas fa-sync fa-lg"></i></button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layoutAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/atenderPedidos.blade.php ENDPATH**/ ?>