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
//        Schema::create('customers', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('first_name');
//            $table->string('last_name');
//            $table->string('phone_number')->nullable();
//            $table->string('email')->unique()->nullable();
//            $table->string('postal_address')->nullable();
//            $table->string('physical_address')->nullable();
//            $table->string('description', 255)->nullable();
//            $table->integer('user_role_id')->unsigned()->index();
//            $table->foreign('user_role_id')->references('id')->on('user_roles');
//            $table->boolean('status')->default(true);
//            $table->timestamps();
//            $table->softDeletes();
//        });
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
