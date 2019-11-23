<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionIncludesProductRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_includes_product_relation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('scheme_id');
            $table->foreign('scheme_id')
                ->references('scheme_id')
                ->on('marketing_schemes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('product_id', 15);
            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('promotion_includes_product_relation');
    }
}
