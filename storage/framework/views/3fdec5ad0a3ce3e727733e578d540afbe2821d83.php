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
                    <th style="text-align: center;">Resta</th>

                </tr>
            </thead>
            <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td scope="col" style="text-align: center;"><?php echo e($itens[$i]); ?></td>
                    <td scope="col" style="text-align: center;"><?php echo e($pedido->valorTotal); ?></td>
                    <td scope="col" style="text-align: center;"><?php echo e($pedido->resta); ?></td>
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

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
        Efetuar Pagamento
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Cliente: <?php echo e($cliente->Nome); ?></h1>
                    <form action="/pagamento/store/<?php echo e($conta ->id); ?>">
                        <input type="text" class="form-control" name="pagamento" value="0.00">
                        <button type="submit">Confirmar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/conta/show.blade.php ENDPATH**/ ?>