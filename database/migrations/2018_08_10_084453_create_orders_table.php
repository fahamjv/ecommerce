<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->enum('level', ['nothing','paid','sending','sent'])->default('nothing')->nullable();
            $table->bigInteger('amount')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')->on('customers');

            $table->foreign('seller_id')
                ->references('id')->on('sellers');

            $table->foreign('product_id')
                ->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
