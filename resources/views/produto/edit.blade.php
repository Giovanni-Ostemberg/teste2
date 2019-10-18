@extends('layout')
@section('content')

<form method="post" action="{{route('produtos.update')}}">
    <ul>
        <li><input type = "text" value="{{$produto->nome}}"></li>
        <li><input type = "text" value="{{$produto->preco}}"></li>
        <li><<input type = "text" value="{{$produto->categoria}}">/li>
    </ul>
</form>
@endsection('content')
