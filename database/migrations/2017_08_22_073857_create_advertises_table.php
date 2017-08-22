<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->string('link',255)->nullable();
            $table->string('phone_number',15)->nullable();
            $table->string('email_address',15)->nullable();
            $table->string('website')->nullable();
            $table->decimal('price_duration')->default(0);
            $table->dateTime('expiration_date');
            $table->integer('total_day_advertise')->default(0);
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('advertises');
    }
}
