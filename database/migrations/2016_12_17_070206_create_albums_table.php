<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function down()
    {
        Schema::dropIfExists('albums', function (Blueprint $table) {
            $table->dropForeign('albums_band_id_foreign');
        });
    }

    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->date('recorded_date')->nullable();
            $table->date('release_date')->nullable();
            $table->string('number_of_tracks')->nullable();
            $table->string('label')->nullable();
            $table->string('producer')->nullable();
            $table->string('genre')->nullable()->index();
            $table->integer('band_id')->unsigned()->index();
            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
