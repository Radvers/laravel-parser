<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_producers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->bigInteger('producer_id')->unsigned();
            $table->foreign('producer_id')->references('id')->on('producers');
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
        Schema::dropIfExists('movies_producers');
    }
}
