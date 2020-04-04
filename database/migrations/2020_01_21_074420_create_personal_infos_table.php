<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('firstname');
            $table->String('lastname');
            $table->String('gender');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            # foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_infos');
    }
}
