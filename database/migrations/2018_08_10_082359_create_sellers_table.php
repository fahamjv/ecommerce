<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id')->unique()->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('email')->nullable()->unique();
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->string('wallpaper')->nullable();
            $table->string('website')->nullable();
            $table->string('NationalCode')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->boolean('EmailVerified')->nullable()->default(0);;
            $table->string('city')->nullable();
            $table->string('lastIp')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('sellers');
    }
}
