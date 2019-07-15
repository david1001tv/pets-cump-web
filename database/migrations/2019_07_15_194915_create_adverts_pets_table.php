<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts_pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('advert_id');
            $table->timestamps();

            $table->foreign('pet_id')->references('id')->on('pets');
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
        Schema::dropIfExists('adverts_pets');
    }
}
