<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conta;
use App\Itens;
use App\Pedido;
use App\Produto;
use http\Client;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clientes=Cliente::get();
       $produtos=Produto::get();
       return view('pedido.index',['clientes' => $clientes->sortBy('Nome')],['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido -> conta_id = $request ->conta_id;
        $pedido -> cliente_id = $request -> cliente_id;
        $pedido -> valorTotal = 0;
        $pedido -> pago = 0;
        $pedido -> resta = 0;
        $pedido -> save();
        $i = 0;
        foreach ($request->produto_id as $item){

            $itens = new Itens();
            $itens -> pedido_id = $pedido -> id;
            $itens -> produto_id = $item;
            $itens -> quantidade = $request -> quantidade[$i];
            $itens -> total = $request -> quantidade[$i] * $request -> produto_preco[$i];
            $pedido -> valorTotal += $itens -> total;
            $itens -> save();
            $i++;
        }
        $pedido -> resta = $pedido -> valorTotal;
        $pedido -> save();
        $conta = new ContaController();
        $conta->adicionaPedido($pedido -> conta_id);





        return redirect()->route('pedidos.index') ->with('message', 'ok');
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

    public function itens($id)
    {
        $itens = Itens::get()->where('pedido_id', $id);
        $conteudo = "";
        $i = true;
        foreach($itens as $item){
            if($i!=true){
                $conteudo=$conteudo." + ";
            }
            $conteudo=$conteudo.$item->quantidade." * ".Produto::findOrFail($item->produto_id)->nome;
            $i=false;
        }
        return $conteudo;
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
    public function update(Request $request, $id)
    {
        //
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
