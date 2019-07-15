<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->string('f_name')->default('');
            $table->string('l_name')->default('');
            $table->string('address')->default('');
            $table->text('bio')->default('');
            $table->string('phone')->default('');
            $table->string('email');
            $table->string('password');
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
