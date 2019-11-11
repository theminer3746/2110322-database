<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_staffs', function (Blueprint $table) {
            $table->char('sale_staff_ssn', 13);
            $table->foreign('sale_staff_ssn')->references('ssn')->on('employees')->onDelete('cascade');
            $table->unsignedInteger('sales_amount');
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
        Schema::dropIfExists('sale_staffs');
    }
}
