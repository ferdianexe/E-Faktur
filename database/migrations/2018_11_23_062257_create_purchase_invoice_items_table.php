<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_invoices_id');
            $table->timestamps();
            $table->string('nama');
            $table->string('satuan')->nullable(true)->default(0);
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('diskon');
            $table->foreign('purchase_invoices_id')->references('id')->on('purchase_invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_invoice_items');
    }
}
