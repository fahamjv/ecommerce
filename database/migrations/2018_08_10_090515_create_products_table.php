<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->integer('count')->nullable()->default(0);
            $table->enum('level',['pending', 'accepted', 'inappropriate'])->nullable()->default('pending');
            $table->string('location')->nullable();

            $table->integer('image_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('seller_id')->unsigned();

            $table->foreign('image_id')
                ->references('id')->on('product_images');

            $table->foreign('category_id')
                ->references('id')->on('product_categories');


            $table->foreign('seller_id')
                ->references('id')->on('sellers');

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
        Schema::dropIfExists('products');
    }
}
