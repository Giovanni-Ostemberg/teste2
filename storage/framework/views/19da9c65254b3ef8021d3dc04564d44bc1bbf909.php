<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Categoria</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deletar</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($produto -> id); ?></th>
                <td><?php echo e($produto -> nome); ?></td>
                <td><?php echo e(money_format ( "R$ %n" , $produto -> preco)); ?></td>
                <td><?php echo e($produto -> categoria); ?></td>
                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo e($produto->id); ?>">
                        Editar
                    </button>
                    <div class="modal fade" id="modalEdit<?php echo e($produto->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado">Editar Produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/produto/update/<?php echo e($produto->id); ?>">
                                    <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>;
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Produto</span>
                                            </div>
                                            <input type="text" class="form-control" name="nome" value="<?php echo e($produto->nome); ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Preço</span>

                                                <input type="text"  class="form-control" name="preco" value="<?php echo e($produto->preco); ?>">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Categoria</span>
                                                <input type="text" class="form-control"  name="categoria" value="<?php echo e($produto->categoria); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td><form method="get" action="/produto/<?php echo e($produto->id); ?>/destroy">
                        <button class="button" type="submit">Excluir</button>
                    </form></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="3"></td>
            <td style="text-align:center;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                    Novo Produto
                </button>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Inserir novo produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo e(route('produtos.store')); ?>">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Produto</span>
                            </div>
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Preço</span>

                                <input type="text"  class="form-control" name="preco">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Categoria</span>
                                <input type="text" class="form-control"  name="categoria">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/produto/index.blade.php ENDPATH**/ ?>