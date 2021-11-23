 

<?php $__env->startSection('title','Cadastro de Peças'); ?> 

<?php $__env->startSection('content'); ?> 

<div class="container-fluid">

    <div id="tarefas-create-container" class="col-md-6 offset-md-3">
        <h1>Cadastro de novas peças</h1>

        <form action="/cadastra" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input name="tipo" id="tipo"  class="form-control" placeholder="Tipo a que pertence a peça cadastrada" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" id="nome"  class="form-control" placeholder="Nome peça" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao"  class="form-control" placeholder="Descrição da peça"></textarea>
            </div>
            <div class="form-group">
                <label for="tamanho">Tamanho</label>
                <select name="tamanho" id="tamanho" class="form-control">
                    <option value="">Escolha um tamanho</option>>
                    <option value="G">Grande</option>
                    <option value="M">Média</option>
                    <option value="P">Pequena</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cor">Cor</label>
                <input name="cor" id="cor"  class="form-control" placeholder="Cor da peça" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <input name="marca" id="marca"  class="form-control" placeholder="Marca da peça" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" step="any" name="valor" id="valor"  class="form-control" placeholder="R$ xx,xx" autocomplete="off">
            </div><br>
            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" id="imagem"  class="form-control">
            </div><br>
            <input type="submit" class="btn btn-primary" value="Cadastrar Item">
        </form>
    </div>


<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layout.layoutAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/admin/create.blade.php ENDPATH**/ ?>