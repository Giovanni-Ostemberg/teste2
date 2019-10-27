@extends('layout')

@section('content')

    <div>
        <h1 text-align="center">Clientes</h1>
    </div>
    @foreach($clientes as $cliente)
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action list-group-item-dark" style="text-align: center; background-color:" data-toggle="modal" data-target="#modalPedido{{$cliente->id}}">
                {{$cliente->Nome}}
            </button>
        </div>
        <div class="modal fade" id="modalPedido{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">{{$cliente->Nome}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{route('pedidos.store')}}">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" value="{{$cliente->conta_id}}" name="conta_id">
                            <input type="hidden" value="{{$cliente->id}}" name="cliente_id" id="clienteId{{$cliente->id}}">
                            <div class="input-group mb-3">
                                <table id="tabela{{$cliente->id}}">
                                    <tr>
                                        <td style="width:45%;">
                                            <select class="form-control" id="produto0_{{$cliente->id}}" name="produto_id[]" onchange="sincronizaPreco('produto0_{{$cliente->id}}',{{$produtos}},'preco0_{{$cliente->id}}'),calcularValor('quantidade0_{{$cliente->id}}','preco0_{{$cliente->id}}','linha0_{{$cliente->id}}', 'tabela{{$cliente->id}}','valorFinal{{$cliente->id}}',{{$cliente->id}})">
                                                @foreach($produtos as $produto)
                                                    <option value="{{$produto->id}}"  onclick="sincronizaPreco('{{$produto->preco}}', 'preco0_{{$cliente->id}}')">{{$produto->nome}}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td style="width:15%;">
                                            <input type="text " class="form-control" id="preco0_{{$cliente->id}}" name="produto_preco[]" onchange="calcularValor('quantidade0_{{$cliente->id}}','preco0_{{$cliente->id}}','linha0_{{$cliente->id}}', 'tabela{{$cliente->id}}','valorFinal{{$cliente->id}}',{{$cliente->id}})">
                                        </td>
                                        <td style="width:15%;"><input onchange="calcularValor('quantidade0_{{$cliente->id}}','preco0_{{$cliente->id}}','linha0_{{$cliente->id}}', 'tabela{{$cliente->id}}','valorFinal{{$cliente->id}}',{{$cliente->id}})" id="quantidade0_{{$cliente->id}}" class="form-control" name="quantidade[]" type="number" value="1"></td>
                                        <td style="width:20%;"><input class="form-control" type="text" name="valorTotal[]" value="0" id="linha0_{{$cliente->id}}"></td>
                                        <td style="width:10%; text-align: right;"><button class="btn btn-primary" style="width:80%;"type="button" onclick="removerLinha(this,'tabela{{$cliente->id}}')"> - </button> </td>
                                    </tr>
                                </table>
                            </div>

                            <div style="text-align:right; margin-bottom: 1em;">
                                <button type="button" class="btn btn-primary"  onclick="inserirNovo('tabela{{$cliente->id}}',{{$cliente->id}})">+</button>
                            </div>
                            <div style="margin-bottom: 0.5em;">
                                <table>
                                    <tr>
                                        <td style="width:70%; text-align: right; padding: 1em;"><h5 style="padding-top: 0.5em;">Valor Total</h5></td>
                                        <td style="width:20%;"><input class="form-control" type="text" value="0" name="valorFinal[]" id="valorFinal{{$cliente->id}}"></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endforeach

@endsection('content')
