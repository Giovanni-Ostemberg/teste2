
@extends('layout')

@section('content')
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
        @foreach($produtos as $produto)
            <tr>
                <th scope="row">{{$produto -> id}}</th>
                <td>{{$produto -> nome}}</td>
                <td>{{money_format ( "R$ %n" , $produto -> preco)}}</td>
                <td>{{$produto -> categoria}}</td>
                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit{{$produto->id}}">
                        Editar
                    </button>
                    <div class="modal fade" id="modalEdit{{$produto->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado">Editar Produto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="/produto/update/{{$produto->id}}">
                                    <div class="modal-body">
                                        @csrf
                                        @method('PATCH');
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Produto</span>
                                            </div>
                                            <input type="text" class="form-control" name="nome" value="{{$produto->nome}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Preço</span>

                                                <input type="text"  class="form-control" name="preco" value="{{$produto->preco}}">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend" style="width:100%;">
                                                <span class="input-group-text" id="basic-addon1">Categoria</span>
                                                <input type="text" class="form-control"  name="categoria" value="{{$produto->categoria}}">
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
                <td><form method="get" action="/produto/{{$produto->id}}/destroy">
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
                <form method="post" action="{{route('produtos.store')}}">
                    <div class="modal-body">
                        @csrf
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



@endsection('content')
