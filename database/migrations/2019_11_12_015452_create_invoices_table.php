<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->unsignedInteger('invoice_id')->autoIncrement();
            $table->timestamp('paid_at')->nullable();
            $table->string('payment_method', 20)->nullable()();
            $table->string('additional_information', 2000)->nullable();
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')
                ->references('customer_id')
                ->on('customers')
                ->onDelete('cascade');
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')
                ->references('address_id')
                ->on('customer_addresses')
                ->onDelete('cascade');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('customer_orders')
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
        Schema::dropIfExists('invoices');
    }
}
