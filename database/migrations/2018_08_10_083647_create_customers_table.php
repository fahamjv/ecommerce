<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('phone')->nullable();
            $table->string('national_code')->nullable();
            $table->string('last_ip')->nullable();
            $table->boolean('email_verified')->nullable()->default(0);;
            $table->rememberToken();
            $table->timestamps();

            $table->integer('customer_addresses_id')->nullable()->unsigned();

            $table->foreign('customer_addresses_id')
                ->references('id')->on('customer_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
