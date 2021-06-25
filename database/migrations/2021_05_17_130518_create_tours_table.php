<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('picture');
            $table->string('title');
            $table->integer('price');
            $table->string('country_name')->nullable();
            $table->longText('description');
            $table->string('total_days');
            $table->string('game_drives')->nullable();
            $table->string('getting_around')->nullable();
            $table->string('back_to_airport')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
