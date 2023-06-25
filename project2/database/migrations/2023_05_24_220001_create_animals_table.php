<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('gender');
            $table->unsignedInteger('age');
            $table->text('description');
            $table->string('photo_link')->nullable();
            $table->bigInteger('type')->unsigned();
            $table->bigInteger('color')->unsigned();
            $table->bigInteger('city')->unsigned();
            $table->foreign('type')->references('id')->on('types')->onDelete('restrict');
            $table->foreign('color')->references('id')->on('colors')->onDelete('restrict');
            $table->foreign('city')->references('id')->on('cities')->onDelete('restrict');
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
        Schema::dropIfExists('animals');
    }
}
