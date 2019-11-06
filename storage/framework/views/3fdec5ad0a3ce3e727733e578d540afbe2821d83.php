<?php $i=0 ?>
<?php $__env->startSection('content'); ?>

    <div>
        <h1 text-align="center"><?php echo e($cliente->Nome); ?></h1>
    </div>
    <div style="margin: 3em auto;">
        <table class="table table-bordered table-dark table-hover" style="width:60%; margin:auto;">
            <thead>
            <tr>
                <th style="text-align: center;">Data</th>
                <th style="text-align: center;">Itens</th>
                <th style="text-align: center;">Total</th>
                <th style="text-align: center;">Resta</th>
                <th style="text-align: center;">Add</th>
            </tr>
            </thead>
            <tbody>
            <form action="/pagamento/parcial/<?php echo e($conta->id); ?>">
                <input type="hidden" name="cliente" value="<?php echo e($cliente->id); ?>">
                <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($pedido->resta == 0): ?>
                        <tr class="table-success">
                    <?php else: ?>
                        <?php if($pedido->resta < $pedido->valorTotal ): ?>
                            <tr class="table-warning">
                        <?php else: ?>
                            <tr class="table-danger">
                                <?php endif; ?>
                                <?php endif; ?>
                                <td scope="col" style="text-align: center; color:black;"><?php echo e(\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')); ?></td>
                                <td scope="col" style="text-align: center; color:black;"><?php echo e($itens[$i]); ?></td>
                                <td scope="col" style="text-align: center; color:black;"><?php echo e($pedido->valorTotal); ?></td>
                                <td scope="col" style="text-align: center; color:black;"><?php echo e($pedido->resta); ?></td>
                                <td scope="col" style="text-align: center; color:black;"><input type="checkbox" value="<?php echo e($pedido->id); ?>" id="parcial<?php echo e($pedido->id); ?>" name="pedido[]" onClick="somaPedido(<?php echo e($pedido->resta); ?>,'parcial<?php echo e($pedido->id); ?>')"></td>

                                <?php $i++ ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th style="text-align: center;">Valor Total</th>
                                <td style="text-align: center;"><?php echo e($conta->saldoTotal); ?></td>
                                <td>Parcial</td>
                                <td><input type="text" id="parcial" name="somaParcial" value="0"></td>
                                <td><button type="submit">Pagar Parcial</button></td>
                            </tr>
            </form>
            </tbody>
        </table>
        Adicionar a opção de totalizar os pedidos abertos até uma data específica
    </div>
    <div>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Últimos Pagamentos
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
            Efetuar Pagamento
        </button>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <table class="table table-bordered table-dark table-hover" style="width:60%; margin:auto;">

                    <?php $__currentLoopData = $pagamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="/pagamento/<?php echo e($pagamento->id); ?>/destroy">
                            <tr class="table-success">
                                <td scope="col" style="text-align: center; color:black;"><?php echo e(\Carbon\Carbon::parse($pagamento->created_at)->format('d/m/Y')); ?></td>
                                <td scope="col" style="text-align: center; color:black;"><?php echo e($pagamento->valor); ?></td>
                            </tr>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            </div>
        </div>

    </div>

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
                        <input type="hidden" name="cliente" value="<?php echo e($cliente->id); ?>">
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
    <script>
        function somaPedido(valor, name){
            var linha = document.getElementById(name);
            var total = parseFloat(document.getElementById('parcial').value);
            var valor = parseFloat(valor);
            console.log(linha);
            if(total==0){
                total = valor;
            }else{
                if(linha.checked){
                    total+=valor;
                }else {
                    total -= valor;
                }
            }
            document.getElementById('parcial').value = total;
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/conta/show.blade.php ENDPATH**/ ?>