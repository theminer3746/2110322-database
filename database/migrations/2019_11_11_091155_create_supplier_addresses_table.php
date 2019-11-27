<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_addresses', function (Blueprint $table) {
            $table->unsignedInteger('address_id')->autoIncrement();
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('supplier_id')
                ->on('suppliers')
                ->onDelete('cascade');
            $table->string('line_1', 50);
            $table->string('line_2', 50)->nullable();
            $table->string('city', 50);
            $table->char('country', 3);
            $table->string('postal_code', 10);
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
        Schema::dropIfExists('supplier_addresses');
    }
}
