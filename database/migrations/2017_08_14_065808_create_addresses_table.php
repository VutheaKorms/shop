<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('addresses', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('address1', 255);
//            $table->string('address2', 255)->nullable();
//            $table->integer('country_id')->unsigned()->index();
//            $table->foreign('country_id')->references('id')->on('countries');
//            $table->integer('state_id')->unsigned()->index();
//            $table->foreign('state_id')->references('id')->on('states');
//            $table->integer('location_id')->unsigned()->index();
//            $table->foreign('location_id')->references('id')->on('locations');
//            $table->integer('user_id')->unsigned()->index();
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->boolean('status')->default(true);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
