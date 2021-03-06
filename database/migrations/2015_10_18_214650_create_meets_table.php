<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('objetive');
            $table->string('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('suggestion');
            //$table->timestamps();
        });
        Schema::create('meet_user', function (Blueprint $table) {
          $table->integer('user_id')->unsigned()->index();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('meet_id')->unsigned()->index();
          $table->foreign('meet_id')->references('id')->on('meets')->onDelete('cascade');
          $table->boolean('owner');
          //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('meet_user');
        Schema::drop('meets');
    }
}
