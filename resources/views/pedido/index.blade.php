<head>
    <script language="JavaScript">
        function inserirNovo(idTabela, id){
            var table = document.getElementById(idTabela);
            var numOfRows = table.rows.length;
            var newRow = table.insertRow(numOfRows);
            var cell0 = newRow.insertCell(0);
            cell0.innerHTML='Produto';
            var cell1 = newRow.insertCell(1);
            cell1.innerHTML='<select class="form-control" name="produto_id">\n' +
                '                                            @foreach($produtos as $produto)\n' +
                '                                                <option value="{{$produto->id}}">{{$produto->nome}}</option>\n' +
                '                                            @endforeach\n' +
                '                                        </select>';
            var cell2 = newRow.insertCell(2);
            cell2.innerHTML='<input class="form-control" name="quantidade" type="number" value="1">';
            var cell3 = newRow.insertCell(3);
            cell3.innerHTML='<input type="text" name="valorTotal" value="0">';
            var cell4 = newRow.insertCell(4);
            var char = "'"
            var tabelaId = char.concat(idTabela, char);
            cell4.innerHTML="<button type=\"button\" onclick=\"removerLinha(this,"+tabelaId+")\"> - </button>";



        }
        function removerLinha(row,idTabela) {
            var x=row.parentNode.parentNode.rowIndex;
            document.getElementById(idTabela).deleteRow(x);
        }
    </script>

</head>
@extends('layout')

@section('content')

    @foreach($clientes as $cliente)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPedido{{$cliente->id}}">
            {{$cliente->Nome}}
        </button>
        <div class="modal fade" id="modalPedido{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">{{$cliente->Nome}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/pedido/update/{{$cliente->id}}">
                        <div class="modal-body">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" value="{{$cliente->conta_id}}" name="conta_id">
                            <input type="hidden" value="{{$cliente->id}}" name="cliente_id">
                            <div class="input-group mb-3">
                                <table id="tabela{{$cliente->id}}">
                                    <tr>
                                        <th>Produto</th>
                                        <td>
                                            <select class="form-control" name="produto_id">
                                                @foreach($produtos as $produto)
                                                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input class="form-control" name="quantidade" type="number" value="1"></td>
                                        <td><input type="text" name="valorTotal" value="0"></td>
                                        <td><button type="button" onclick="removerLinha(this,'tabela{{$cliente->id}}')"> - </button> </td>
                                    </tr>
                                </table>
                                <button type="button" onclick="inserirNovo('tabela{{$cliente->id}}',{{$cliente->id}})">Adicionar</button>
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
