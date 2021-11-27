<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title> 
    <link rel="shortcut icon" href="<?php echo e(asset('/imagem/dema.png')); ?>" type="image/x-icon">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

    
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    
    <link rel="stylesheet" href="/css/style.css">
    
    
    <script src="/scripts/script.js"></script>
    

</head>
<body id="body">
    <header id="header">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="<?php echo e(asset('/imagem/LGpreta.png')); ?>" alt="logo da empresa">
            </a>
            <div id="search-container" class="col-md-4">
                <form action="/" method="GET">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscando por....">
                </form>
            </div>
            <ul class="navbar-nav">
                <?php if(auth()->guard()->check()): ?>
                <li>
                    <a href="/user/profiler" class="nav-link"><?php if(\Auth::user()): ?><?php echo e(\Auth::user()->name); ?> <?php endif; ?> <i class="far fa-address-card fa-lg"></i></a>
                </li>
                <?php if(\Auth::user()->email == "amiltongomes2301@gmail.com"): ?>
                <li>
                    <a href="<?php echo e(route('admin')); ?>" class="nav-link">Admin <i class="fas fa-user-cog"></i></a></li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(route('historico_compras')); ?>" class="nav-link">Compras <i class="fas fa-shopping-bag"></i></a>
                </li>
                <li>
                    <a href="<?php echo e(route('ver_carrinho')); ?>" class="nav-link">Carrinho <i class="fab fa-shopify fa-lg"></i></a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        <?php echo csrf_field(); ?>
                        <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair <i class="fas fa-sign-out-alt"></i></a>
                    </form>
                </li>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                <li>
                    <a href="/register" class="nav-link">Cadastrar-se</a>
                </li>
                <li>
                    <a href="/login" class="nav-link">Logar-se</a>
                </li>
                <?php endif; ?>
            </ul>
            </div>
        </nav>

        </header>
        <main>

            <div class="container-fluid">
                <div class="row">
                    <?php if($message = Session::get('err')): ?>
                        <div class="col-12">
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if($message = Session::get('ok')): ?>
                        <div class="col-12">
                            <div class="alert alert-success"><?php echo e($message); ?></div>
                        </div>
                    <?php endif; ?>
                    
                        <?php if(isset($tipoProdutos) || isset($marcaProdutos)): ?>
                        <div class="container filter-container">
                            <div class="row">
                                <div class="col-12 itens_select">
                                    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
                                    <ul class="navbar-nav">
                                        <?php $__currentLoopData = $tiposProdutos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <form action="/" method="GET">
                                                <?php echo csrf_field(); ?>
                                                <li class="nav-link">
                                                    <input class="nav-link nav-tipo" name="tipo" id="tipo"  onclick="this.form.submit()" type="submit" value="<?php echo e($produto->tipo); ?>">
                                                </li>
                                            </form>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $marcaProdutos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <form action="/" method="GET">
                                            <?php echo csrf_field(); ?>
                                                <li class="nav-link">
                                                    <input class="nav-link nav-marca" name="marca" id="marca"  onclick="this.form.submit()" type="submit" value="<?php echo e($produto->marca); ?>">
                                                </li>
                                                </form>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </nav>
                                </div>
                        <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?> 
                </div>
            </div>
        </main>
        <footer>
        <p>
          <h5>Demadan Store &copy; 2021 Loja de roupas femeninas</h5>
        </p>
        <p>
            R. Joinville, 3001 - São Pedro, São José dos Pinhais - PR, 83307-070
        </p>
    </footer>

</body>
</html>
<?php /**PATH C:\Users\amilt\OneDrive\Área de Trabalho\PI\DEMADANSTORE\demadan\resources\views/layout/layout.blade.php ENDPATH**/ ?>