<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produtos','ProdutoController');
Route::patch('/produto/update/{produto}', 'ProdutoController@update');
Route::get('/produto/{produto}/destroy', 'ProdutoController@destroy');

Route::resource('clientes','ClienteController');
Route::patch('/cliente/update/{cliente}', 'ClienteController@update');
Route::get('/cliente/{cliente}/destroy', 'ClienteController@destroy');

Route::resource('pedidos','PedidoController');
Route::patch('/pedido/update/{pedido}', 'PedidoController@update');
Route::get('/pedido/{pedido}/destroy', 'PedidoController@destroy');

Route::resource('contas','ContaController');
Route::patch('/conta/update/{conta}', 'ContaController@update');
Route::get('/conta/show/{cliente}','ContaController@show');

Route::get('/pagamento/store/{conta}', 'PagamentoController@store');
Route::get('/pagamento/{pagamento}/destroy', 'PagamentoController@destroy');
