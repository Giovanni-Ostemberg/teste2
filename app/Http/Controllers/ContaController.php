<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pagamento;
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
        $contas = Conta::get();
        return view('conta.index',['clientes'=>$clientes->sortBy('Nome')],['contas'=>$contas]);
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
        $cliente = Cliente::findOrFail($id);
        $conta = Conta::findOrFail($cliente->conta_id);
        $pedidos = Pedido::get()
            ->where('conta_id',$conta->id)
            ->where('resta','>',0);
        $pagamentos = Pagamento::get()->where('conta_id',$conta->id);
        foreach ($pedidos as $pedido){
            $controller = new PedidoController();
            $itens[]=$controller->itens($pedido->id);
        }

        return view('conta.show',['cliente' =>$cliente,'conta' => $conta,'pedidos' => $pedidos, 'itens'=>$itens, 'pagamentos'=>$pagamentos]);

    }

    public function showAll($id)
    {
        $cliente = Cliente::findOrFail($id);
        $conta = Conta::findOrFail($cliente->conta_id);
        $pedidos = Pedido::get()
            ->where('conta_id',$conta->id);
        $pagamentos = Pagamento::get()->where('conta_id',$conta->id);
        foreach ($pedidos as $pedido){
            $controller = new PedidoController();
            $itens[]=$controller->itens($pedido->id);
        }

        return view('conta.show',['cliente' =>$cliente,'conta' => $conta,'pedidos' => $pedidos, 'itens'=>$itens, 'pagamentos'=>$pagamentos]);

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
        $pedidos = Pedido::get()->where('conta_id',$conta->id);
        $pagamentos = Pagamento::get()->where('conta_id', $conta->id);
        if($conta->saldoTotal>0){
            $pago = $conta->saldoTotal;
            foreach ($pedidos as $pedido){
                if($pedido->resta>$pago){
                    $pedido->resta-=$pago;
                    $pedido->save();
                    $pago = 0;
                }else{
                    $pago -= $pedido->resta;
                    $pedido->resta = 0;
                    $pedido->save();
                }
                $conta -> saldoTotal -= $pedido -> valorTotal;
            }
        }
        $conta -> saldoTotal = 0;
        foreach ($pedidos as $pedido){
            $conta -> saldoTotal -= $pedido -> valorTotal;
        }
        foreach ($pagamentos as $pagamento){
            $conta -> saldoTotal += $pagamento -> valor;
        }
        $conta->save();

    }

    public function adicionaPagamento($id, $pagamento,$parcial)
    {
        $conta = Conta::findOrFail($id);
        $pedidos = Pedido::get()->where('conta_id',$conta->id);

        $conta -> saldoTotal = 0;
        $pago = $pagamento;
        if($parcial == false) {
            foreach ($pedidos as $pedido) {
                if ($pedido->resta > $pago) {
                    $pedido->resta -= $pago;
                    $pedido->save();
                    $pago = 0;
                } else {
                    $pago -= $pedido->resta;
                    $pedido->resta = 0;
                    $pedido->save();
                }
                $conta->saldoTotal -= $pedido->valorTotal;
            }
        }else{
            foreach($pedidos as $pedido){
                $conta->saldoTotal -= $pedido->valorTotal;
            }
        }
        $pagamentos = Pagamento::get()->where('conta_id', $conta->id);
        foreach ($pagamentos as $pagamento){
            $conta -> saldoTotal += $pagamento -> valor;
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
