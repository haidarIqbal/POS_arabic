<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('product_id');
            $table->string('quantity');
            $table->string('unitprice');
            $table->string('payment_t');
            $table->string('discount');
            $table->string('amount');
            $table->string('store');
             $table->string('bar');
            $table->string('vat');
            $table->string('vatTotal');
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
        Schema::drop('quotations');
    }
}
