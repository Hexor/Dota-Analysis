<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_counters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('hero_id')->comment('英雄id');
            $table->unsignedTinyInteger('countered_hero_id')->comment('被克制的英雄id');
            $table->unsignedTinyInteger('point')->comment('被克制的程度大小');
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
        Schema::dropIfExists('hero_counters');
    }
}
