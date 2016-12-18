<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('band_id')->unsigned();
            $table->string('name');
            $table->date('recorded_date');
            $table->date('release_date');
            $table->integer('number_of_tracks');
            $table->string('label');
            $table->string('producer');
            $table->string('genre');
            $table->timestamps();
        });

        // Do this in 2 steps per http://stackoverflow.com/questions/22615926/migration-cannot-add-foreign-key-constraint-in-laravel
        Schema::table('albums', function(Blueprint $table) {
            // Leave no orphans
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
