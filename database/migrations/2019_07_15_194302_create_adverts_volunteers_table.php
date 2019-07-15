<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts_volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('advert_id');
            $table->timestamps();

            $table->foreign('volunteer_id')->references('id')->on('users');
            $table->foreign('advert_id')->references('id')->on('adverts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts_volunteers');
    }
}
