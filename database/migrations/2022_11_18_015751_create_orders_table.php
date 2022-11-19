<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
              
            $table->unsignedBigInteger('detalle_pedido_id');
            $table->foreign('detalle_pedido_id')->references('id')->on('order_details')->onUpdate('cascade')->onDelete('cascade');

            $table->date('fecha_pedido');
            $table->float('valor_total',12,2);
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
        Schema::dropIfExists('orders');
    }
}
