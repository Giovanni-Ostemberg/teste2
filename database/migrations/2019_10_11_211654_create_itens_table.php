<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->integer('produto_id')->foreign('produto_id')->references('id')->on('produto');
            $table->integer('pedido_id')->foreign('pedido_id')->references('id')->on('pedido');
            $table->integer('quantidade');
            $table->float('total');
            $table->primary(['produto_id', 'pedido_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens');
    }
}
