<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Cpf</th>
            <th scope="col">Endereço</th>
            <th scope="col">Telefone</th>
            <th scope="col">Conta</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deletar</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($cliente -> id); ?></th>
                <td><?php echo e($cliente -> Nome); ?></td>
                <td><?php echo e($cliente -> cpf); ?></td>
                <td><?php echo e($cliente -> endereco); ?></td>
                <td><?php echo e($cliente -> telefone); ?></td>
                <td><?php echo e($cliente -> conta_id); ?></td>
                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo e($cliente->id); ?>">
                        Editar
                    </button>
                    <div class="modal fade" id="modalEdit<?php echo e($cliente->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado">Editar Cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/cliente/update/<?php echo e($cliente->id); ?>">
                                    <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>;
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Cliente</span>
                                            </div>
                                            <input type="text" class="form-control" name="nome" value="<?php echo e($cliente->Nome); ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Cpf</span>

                                                <input type="text"  class="form-control" name="cpf" value="<?php echo e($cliente->cpf); ?>">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Endereço</span>
                                                <input type="text" class="form-control"  name="endereco" value="<?php echo e($cliente->endereco); ?>">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Telefone</span>
                                                <input type="text" class="form-control"  name="telefone" value="<?php echo e($cliente->telefone); ?>">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Conta</span>
                                                <input type="text" class="form-control"  name="conta" value="<?php echo e($cliente->conta_id); ?>">
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
                <td><form method="get" action="/cliente/<?php echo e($cliente->id); ?>/destroy">
                        <button class="button" type="submit">Excluir</button>
                    </form></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="3"></td>
            <td style="text-align:center;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                    Novo Cliente
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
                <form method="post" action="<?php echo e(route('clientes.store')); ?>">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Cliente</span>
                            </div>
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Cpf</span>

                                <input type="text"  class="form-control" name="cpf">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Telefone</span>
                                <input type="text" class="form-control"  name="telefone">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Rua</span>
                                <input type="text" class="form-control"  name="rua">
                            </div>
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Número</span>
                                <input type="text" class="form-control"  name="numero">
                            </div>
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Bairro</span>
                                <input type="text" class="form-control"  name="bairro">
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/cliente/index.blade.php ENDPATH**/ ?>