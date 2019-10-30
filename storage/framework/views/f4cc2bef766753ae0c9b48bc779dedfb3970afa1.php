<?php $__env->startSection('content'); ?>

    <div>
        <h1 text-align="center">Clientes</h1>
    </div>
    <table class="table table-bordered table-dark table-hover">
        <thead>
        <tr class="bg-warning">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor Atual</th>
            <th scope="col">Último Pagamento</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cliente->id); ?></td>
                <td>
                    <a href="/conta/show/<?php echo e($cliente->id); ?>">
                        <button type="button" class="btn btn-dark">
                            <?php echo e($cliente->Nome); ?>

                        </button>
                    </a>
                </td>
                <td><?php echo e($contas[($cliente->conta_id)-1]->saldoTotal); ?></td>
                <td><?php echo e($contas[($cliente->conta_id)-1]->updated_at); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/conta/index.blade.php ENDPATH**/ ?>