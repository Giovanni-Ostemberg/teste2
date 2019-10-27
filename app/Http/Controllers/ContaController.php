<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pedido;
use App\Produto;
use Illuminate\Http\Request;
use \App\Conta;
class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        $produtos = Produto::get();
        $pedidos = Pedido::get();
        return view('conta.index',['clientes'=>$clientes->sortBy('Nome')],['produtos'=>$produtos],['pedidos'=>$pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $conta = new Conta();
        $conta -> saldoTotal = 0;
        $conta -> save();
        return($conta -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adicionaPedido($id)
    {
        $conta = Conta::findOrFail($id);
        $pedidos = Pedido::get()->where('conta_id',$conta->id)->where('resta','>',0);
        $conta -> saldoTotal = 0;
        foreach ($pedidos as $pedido){
            $conta -> saldoTotal += $pedido -> resta;
            var_dump($conta->saldoTotal);
        }
        $conta->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
