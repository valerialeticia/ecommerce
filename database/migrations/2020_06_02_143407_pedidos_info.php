<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidosInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_info', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('pedido_id');
                $table->unsignedBigInteger('produto_id');
    
    
                $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
                $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
    
                $table->float('price');
                $table->integer('quantity');
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
        Schema::dropIfExists('pedidos_info');
    }
}
