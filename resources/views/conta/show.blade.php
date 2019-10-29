@extends('layout' )
<?php $i=0 ?>
@section('content')

    <div>
        <h1 text-align="center">{{$cliente->Nome}}</h1>
    </div>
    <div style="margin: 3em auto;">
        <table class="table table-bordered table-dark table-hover" style="width:60%; margin:auto;">
            <thead>
                <tr>
                    <th style="text-align: center;">Itens</th>
                    <th style="text-align: center;">Total</th>
                </tr>
            </thead>
            @foreach($pedidos as $pedido)
                <tr>
                    <td scope="col" style="text-align: center;">{{$itens[$i]}}</td>
                    <td scope="col" style="text-align: center;">{{$pedido->valorTotal}}</td>
                    <?php $i++ ?>
                </tr>
            @endforeach

            <tr>
                <th style="text-align: center;">Valor Total</th>
                <td style="text-align: center;">{{$conta->saldoTotal}}</td>
            </tr>
        </table>
    </div>
@endsection('content')
