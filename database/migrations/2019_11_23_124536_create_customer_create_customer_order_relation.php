<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCreateCustomerOrderRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_create_customer_order_relation', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customers');
            $table->unsignedInteger('order_id')->unique();
            $table->foreign('order_id')
                ->references('order_id')
                ->on('customer_orders');
            $table->char('sale_staff_ssn', 13);
            $table->foreign('sale_staff_ssn')
                ->references('sale_staff_ssn')
                ->on('sale_staffs');
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
        Schema::dropIfExists('customer_create_customer_order_relation');
    }
}
