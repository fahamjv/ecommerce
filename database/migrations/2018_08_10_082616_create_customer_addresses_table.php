<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('TransfereeName')->nullable();
            $table->string('TransfereeFamily')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('zip')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('CustomerAddresses');
    }
}
