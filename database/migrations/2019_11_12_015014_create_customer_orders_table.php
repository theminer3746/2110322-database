<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->unsignedInteger('order_id')->autoIncrement();
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customers');
            $table->char('sale_staff_ssn', 13);
            $table->foreign('sale_staff_ssn')
                ->references('sale_staff_ssn')
                ->on('sale_staffs');
            $table->timestamp('order_date');
            $table->unsignedInteger('total_price')->nullable();
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
        Schema::dropIfExists('customer_orders');
    }
}
