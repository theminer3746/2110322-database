<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerOrderHasOneInvoiceRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_orders', function (Blueprint $table) {
            $table->unsignedInteger('invoice_id')->nullable();
            $table->foreign('invoice_id')
                ->references('invoice_id')
                ->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('customer_orders', 'invoice_id')){
            $table->dropColumn('invoice_id');
        }
    }
}
