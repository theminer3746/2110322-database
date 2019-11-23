<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOperateOnCustomerOrderRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_operate_on_customer_order_relation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('customer_orders')
                ->onDelete('cascade');
            $table->string('product_id', 15);
            $table->foreign('product_id')
                ->references('product_id')
                ->on('products');
            $table->unsignedSmallInteger('amount');
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
        Schema::dropIfExists('product_operate_on_customer_order_relation');
    }
}
