<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertiseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advertise_id')->unsigned();
            $table->foreign('advertise_id')->references('id')->on('advertises');
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();
            $table->string('thumb_path')->nullable();
            $table->string('path')->nullable();
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
        Schema::dropIfExists('advertise_images');
    }
}
