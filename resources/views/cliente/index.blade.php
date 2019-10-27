
@extends('layout')

@section('content')
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
        @foreach($clientes as $cliente)
            <tr>
                <th scope="row">{{$cliente -> id}}</th>
                <td>{{$cliente -> Nome}}</td>
                <td>{{$cliente -> cpf}}</td>
                <td>{{$cliente -> endereco}}</td>
                <td>{{$cliente -> telefone}}</td>
                <td>{{$cliente -> conta_id}}</td>
                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$cliente->id}}">
                        Editar
                    </button>
                    <div class="modal fade" id="modalEdit{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado">Editar Cliente</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/cliente/update/{{$cliente->id}}">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH');
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Cliente</span>
                                            </div>
                                            <input type="text" class="form-control" name="nome" value="{{$cliente->Nome}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Cpf</span>

                                                <input type="text"  class="form-control" name="cpf" value="{{$cliente->cpf}}">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Endereço</span>
                                                <input type="text" class="form-control"  name="endereco" value="{{$cliente->endereco}}">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Telefone</span>
                                                <input type="text" class="form-control"  name="telefone" value="{{$cliente->telefone}}">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Conta</span>
                                                <input type="text" class="form-control"  name="conta" value="{{$cliente->conta_id}}">
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
                <td><form method="get" action="/cliente/{{$cliente->id}}/destroy">
                        <button class="button" type="submit">Excluir</button>
                    </form></td>

            </tr>
        @endforeach
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
                <form method="post" action="{{route('clientes.store')}}">
                    <div class="modal-body">
                        @csrf
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



@endsection('content')
