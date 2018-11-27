<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGrandtotalToPurchaseInvoicesItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_invoice_items', function (Blueprint $table) {
            $table->unsignedInteger('totalHarga')->default(0);
            $table->integer('diskon')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_invoice_items', function (Blueprint $table) {
            $table->dropColumn('totalHarga');
            $table->integer('diskon')->default(0)->change();
        });
    }
}
