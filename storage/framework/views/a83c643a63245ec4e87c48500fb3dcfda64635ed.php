<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('produtos.update')); ?>">
    <ul>
        <li><input type = "text" value="<?php echo e($produtoEditar->nome); ?>"></li>
        <li><input type = "text" value="<?php echo e($produtoEditar->preco); ?>"></li>
        <li><<input type = "text" value="<?php echo e($produtoEditar->categoria); ?>">/li>
    </ul>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/produto/edit.blade.php ENDPATH**/ ?>