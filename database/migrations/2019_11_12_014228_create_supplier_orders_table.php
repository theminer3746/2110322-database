<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_orders', function (Blueprint $table) {
            $table->unsignedInteger('order_id')->autoIncrement();
            $table->timestamp('order_date');
            $table->timestamp('payment_date');
            $table->string('payment_method', 10);
            $table->unsignedInteger('total_price');
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
        Schema::dropIfExists('supplier_orders');
    }
}
