<?php $i=0 ?>
<?php $__env->startSection('content'); ?>

    <div>
        <h1 text-align="center"><?php echo e($cliente->Nome); ?></h1>
    </div>
    <div style="margin: 3em auto;">
        <table class="table table-bordered table-dark table-hover" style="width:60%; margin:auto;">
            <thead>
                <tr>
                    <th style="text-align: center;">Itens</th>
                    <th style="text-align: center;">Total</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td scope="col" style="text-align: center;"><?php echo e($itens[$i]); ?></td>
                    <td scope="col" style="text-align: center;"><?php echo e($pedido->valorTotal); ?></td>
                    <?php $i++ ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <th style="text-align: center;">Valor Total</th>
                <td style="text-align: center;"><?php echo e($conta->saldoTotal); ?></td>
            </tr>
        </table>
        Adicionar a opção de totalizar os pedidos abertos até uma data específica
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/conta/show.blade.php ENDPATH**/ ?>