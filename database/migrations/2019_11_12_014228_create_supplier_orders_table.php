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
            $table->char('production_staff_ssn', 13);
            $table->foreign('production_staff_ssn')
                ->references('production_staff_ssn')
                ->on('production_staffs');
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('supplier_id')
                ->on('suppliers');
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
