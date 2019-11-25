<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsHasMeterialsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_has_meterials_relation', function (Blueprint $table) {
            $table->unsignedSmallInteger('material_id');
            $table->foreign('material_id')
                ->references('material_id')
                ->on('materials')
                ->onUpdate('cascade');
            $table->string('product_id', 15);
            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onUpdate('cascade');
            $table->primary(['material_id', 'product_id'], 'id');
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
        Schema::dropIfExists('products_has_meterials_relation');
    }
}
