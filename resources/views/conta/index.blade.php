@extends('layout')

@section('content')

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
        @foreach($clientes as $cliente)
            <tr>
                <td style="text-align: center;">{{$cliente->id}}</td>
                <td style="text-align: center;">
                    <a href="/conta/show/{{$cliente->id}}">
                        <button type="button" class="btn btn-dark">
                            {{$cliente->Nome}}
                        </button>
                    </a>
                </td>
                <td style="text-align: center;">{{$contas[($cliente->conta_id)-1]->saldoTotal}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($contas[($cliente->conta_id)-1]->updated_at)->format('d/m/Y')}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection('content')
