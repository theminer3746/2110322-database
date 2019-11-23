<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_schemes', function (Blueprint $table) {
            $table->unsignedInteger('scheme_id')->autoIncrement();
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('type', 15);
            $table->string('advertisement_detail', 2000)->nullable();
            $table->string('promotion_detail', 2000)->nullable();
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
        Schema::dropIfExists('marketing_schemes');
    }
}
