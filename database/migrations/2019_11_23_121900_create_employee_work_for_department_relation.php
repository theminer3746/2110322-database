<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWorkForDepartmentRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_work_for_department_relation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('ssn', 13);
            $table->foreign('ssn')
                ->references('ssn')
                ->on('employees');
            $table->unsignedTinyInteger('department_id');
            $table->foreign('department_id')
                ->references('department_id')
                ->on('departments');
            $table->date('start_date');
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
        Schema::dropIfExists('employee_work_for_department_relation');
    }
}
