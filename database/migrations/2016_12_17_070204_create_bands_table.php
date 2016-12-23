<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandsTable extends Migration
{
    public function down()
    {
        Schema::dropIfExists('bands');
    }

    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->date('start_date')->nullable();
            $table->string('website')->nullable();
            $table->string('slug')->index();
            $table->enum('still_active', ['yes', 'no'])->nullable()->index();
            $table->timestamps();
        });
    }
}
