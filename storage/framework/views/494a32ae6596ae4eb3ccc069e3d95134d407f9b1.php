<?php $__env->startSection('title','Carrinho'); ?>

<?php $__env->startSection('content'); ?>

<?php
    session_start();
    $total = 0;
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php if(isset($cart) && count($cart) > 0): ?>

                <h3>Itens do meu carrinho</h3>

                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Imagem</th>
                                <th>Descrições</th>
                                <th>Cor</th>
                                <th>Marca</th>
                                <th>Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $itensCarrinho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($itensCarrinho->nome); ?></td>
                                    <td><?php echo e(number_format($itensCarrinho->valor, 2, ',','.')); ?></td>
                                    <td><img src="/img/imagensRoupas/<?php echo e($itensCarrinho->imagem); ?>" height="50" alt="Foto"></td>
                                    <td><?php echo e($itensCarrinho->descricao); ?></td>
                                    <td><?php echo e($itensCarrinho->cor); ?></td>
                                    <td><?php echo e($itensCarrinho->marca); ?></td>
                                    <td><a href="<?php echo e(route('remover', ['index' => $index])); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-lg"></a></td>
                                </tr>
                                <?php
                                    $total +=$itensCarrinho->valor;
                                    $_SESSION['total'] = $total;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p><h4>Carrinho vazio</h4></p>
                <?php endif; ?>

                <?php if(isset($cart) && count($cart) > 0): ?>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            Valor total do pedidio R$ <?php echo number_format($total, 2, ',','.'); ?></td>
                    </tr>
                </tfoot>
                <form action="<?php echo e(route('pagamento')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="pagamentos">
                    </div>
                    <input type="submit" value="Realizar pagamento" class="btn btn-success">
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/produtos/carrinho.blade.php ENDPATH**/ ?>