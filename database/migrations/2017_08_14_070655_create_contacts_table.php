<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('contacts', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name',50);
//            $table->string('number1', 50);
//            $table->string('number2', 50)->nullable();
//            $table->string('email_address', 50)->nullable();
//            $table->string('postal_code',50)->nullable();
//            $table->string('fax_number',50)->nullable();
//            $table->integer('address_id')->unsigned()->index();
//            $table->foreign('address_id')->references('id')->on('addresses');
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
        Schema::dropIfExists('contacts');
    }
}
