<?php

namespace App\Http\Controllers;

use App\Pagamento;
use App\Pedido;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($conta, Request $request)
    {
        $pagamento = new Pagamento();
        $pagamento->valor = $request -> pagamento;
        $pagamento->conta_id = $conta;
        $pagamento -> save();

        $conta1 = new ContaController();
        $conta1->adicionaPagamento($pagamento -> conta_id, $pagamento->valor,false);

        return redirect()->action('ContaController@show',['cliente'=>$request->cliente])->with('message','ok');



    }

    public function parcial($conta, Request $request)
    {
        $pagamento = new Pagamento();
        $pagamento->valor = $request -> somaParcial;
        $pagamento->conta_id = $conta;

        foreach ($request->pedido as $parcial){
            $pedido=Pedido::findOrFail($parcial);
            $pedido->resta =0;
            $pedido->save();
        }
        $pagamento -> save();

        $conta1 = new ContaController();
        $conta1->adicionaPagamento($pagamento -> conta_id, $pagamento->valor,true);

        return redirect()->action('ContaController@show',['cliente'=>$request->cliente])->with('message','ok');

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
    public function destroy($id, Request $request)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->delete();
        return redirect()->action('ContaController@show',['cliente'=>$request->cliente]);
    }
}
