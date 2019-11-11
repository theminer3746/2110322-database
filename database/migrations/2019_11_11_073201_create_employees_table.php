<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('title', 10);
            $table->string('fname', 30);
            $table->string('lname', 30);
            $table->char('ssn', 13)->primary();
            $table->timestamps();
            $table->string('position', 20);
            $table->date('employ_date');
            $table->unsignedInteger('salary');
            $table->string('contact', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
