<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionStaffOrderToSupplierRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_staff_order_to_supp_relation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('production_staff_ssn', 13);
            $table->foreign('production_staff_ssn')
                ->references('production_staff_ssn')
                ->on('production_staffs');
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('supplier_id')
                ->on('suppliers');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('supplier_orders');
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
        Schema::dropIfExists('prod_staff_order_to_supp_relation');
    }
}
