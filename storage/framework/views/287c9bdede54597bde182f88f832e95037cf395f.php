
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        a{
            margin: 0 2em;
            display: inline;
            width:100%;
        }
        h1{
            text-align: center;
            background-color: darkslateblue;
            color:white;
            margin-bottom: 0;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div><a href="/" class="text-white h4">Início</a></div>
    <div style="float:Right;">
        <a class="text-white h4" href="/pedidos">Pedidos</a>
        <a class="text-white h4" href="/produtos">Produtos</a>
        <a class="text-white h4" href="/clientes">Clientes</a>
        <a class="text-white h4" href="/contas">Contas</a>
    </div>

</nav>
<?php echo $__env->yieldContent('content'); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/layout.blade.php ENDPATH**/ ?>