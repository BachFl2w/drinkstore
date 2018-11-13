<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailToppingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_topping', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('topping_id');
            $table->foreign('topping_id')->references('id')->on('toppings')->onDelete('cascade');;
            $table->unsignedInteger('order_detail_id');
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->unsignedInteger('quantity');
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
        Schema::table('order_detail_topping', function(Blueprint $table){
            $table->dropForeign('topping_id');
            $table->dropForeign('order_detail_id');
        });

        Schema::dropIfExists('order_detail_topping');
    }
}
