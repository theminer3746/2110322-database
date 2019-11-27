<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierOrdersSuppliesMaterialsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_orders_supplies_materials_relation', function (Blueprint $table) {
            $table->unsignedSmallInteger('material_id');
            $table->foreign('material_id')
                ->references('material_id')
                ->on('materials');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('supplier_orders');
            $table->primary(['material_id', 'order_id'], 'id');
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
        Schema::dropIfExists('supplier_orders_supplies_materials_relation');
    }
}
