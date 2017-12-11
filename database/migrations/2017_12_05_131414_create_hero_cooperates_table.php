<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroCooperatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_cooperates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('a_hero_id')->comment('其中一个英雄的id');
            $table->unsignedTinyInteger('b_hero_id')->comment('另外一个英雄的id');
            $table->unsignedTinyInteger('point')->comment('合作分数');
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
        Schema::dropIfExists('hero_cooperates');
    }
}
