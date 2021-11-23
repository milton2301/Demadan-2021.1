 

<?php $__env->startSection('title','Pricipal'); ?> 


<?php $__env->startSection('content'); ?> 

<div class="col-12">
    <h2>Pedidos não atendidos</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data e hora da compra</th>
            <th>Situação</th>
            <th>Ver detalhes</th>
        </tr>
        <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <?php if($lista->statusDesc() == "PENDENTE"): ?>
                <tr>
                    <td><?php echo e($lista->created_at->format('d/m/y H:i')); ?></td>
                    <td><?php echo e($lista->statusDesc()); ?></td>
                    <td>
                        <a href="" class="info btn btn-sm btn-info" data-value="<?php echo e($lista->id); ?>" data-bs-toggle="modal" data-bs-target="#modalcompra">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>

<div class="modal fade" id="modalcompra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes do pedido</h5>
            </div>
            <div class="modal-body">
                <div id="itenspedidos"></div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo e(route('atender_pedido', $lista->id)); ?>" class="btn btn-success">Atender pedido</a>
                <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $(".info").on('click', function(){
            let id = $(this).attr("data-value")
            $.post('<?php echo e(route("detalhes_compras")); ?>', {id_pedido : id}, (resultado) => {
                $("#itenspedidos").html(resultado)
            })
        })
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layoutAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/pedidosAdmin.blade.php ENDPATH**/ ?>