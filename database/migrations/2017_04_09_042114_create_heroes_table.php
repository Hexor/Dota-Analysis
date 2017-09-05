<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ability = [
            //前期能力
            'early_battle',
            //carry能力
            'carry',
            //gank能力
            'gank',
            //辅助能力
            'support',
            //逃生能力
            'eacape',
            //攻击距离
            'attack_range',
            //先手能力
            'initiator',
            //控制能力
            'disabler',
            //推进能力
            'push',
            //救人能力
            'savior',
            //blink技能
            'blink',
            //纯粹伤害
            'pure_damage',
            //打钱能力
            'farm',
            //分身能力
            'mirror',
            //爆发能力
            'nuke',
            //肉盾能力
            'tank',
            //隐身能力
            'invisible',
            //闪避能力
            'evade'
        ];

        Schema::create('heroes', function (Blueprint $table) use ($ability) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('alias_name')->nullable();
            $table->string('avatar')->nullable();

            foreach ($ability as $item) {
               $table->integer('ability_'.$item)->default(0);
               $table->integer('counter_'.$item)->default(0);
            }

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
        Schema::dropIfExists('heroes');
    }
}
