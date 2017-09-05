<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);

        $heroesData = [

            [
                'fullname'=>'敌法师',
                'alias_name' => 'df,am',
                'avatar' => '/img/antimage_sb.png',
                'counter_hero' => [
                    '' => '',
                ]
            ],
            [
                'fullname'=>'斧王',
                'alias_name' => 'fw,axe',
                'avatar' => '/img/axe_sb.png'
            ],
            [
                'fullname'=>'祸乱之源',
                'alias_name' => 'bane,tkzy,hlzy,tk',
                'avatar' => '/img/bane_sb.png'
            ],
            [
                'fullname'=>'嗜血狂魔',
                'alias_name' => 'xm,sxkm',
                'avatar' => '/img/bloodseeker_sb.png'
            ],
            [
                'fullname'=>'水晶室女',
                'alias_name' => 'bn,cm,sjsn',
                'avatar' => '/img/crystal_maiden_sb.png'
            ],
            [
                'fullname'=>'卓尔游侠',
                'alias_name' => 'dr,xh,zeyx',
                'avatar' => '/img/drow_ranger_sb.png'
            ],
            [
                'fullname'=>'撼地者',
                'alias_name' => 'xn,hdz,hdsn,es',
                'avatar' => '/img/earthshaker_sb.png'
            ],
            [
                'fullname'=>'主宰',
                'alias_name' => 'jugg,zz,js,bm',
                'avatar' => '/img/juggernaut_sb.png'
            ],
            [
                'fullname'=>'米拉娜',
                'alias_name' => 'pom,mln',
                'avatar' => '/img/mirana_sb.png'
            ],
            [
                'fullname'=>'影魔',
                'alias_name' => 'sf,nm,ym',
                'avatar' => '/img/nevermore_sb.png'
            ],
            [
                'fullname'=>'变体精灵',
                'alias_name' => 'btjl,sr,morph',
                'avatar' => '/img/morphling_sb.png'
            ],
            [
                'fullname'=>'幻影长矛手',
                'alias_name' => 'hz,pl',
                'avatar' => '/img/phantom_lancer_sb.png'
            ],
            [
                'fullname'=>'帕克',
                'alias_name' => 'puck,pk',
                'avatar' => '/img/puck_sb.png'
            ],
            [
                'fullname'=>'帕吉',
                'alias_name' => 'tf,pj,pudge',
                'avatar' => '/img/pudge_sb.png'
            ],
            [
                'fullname'=>'剃刀',
                'alias_name' => 'dh,razor',
                'avatar' => '/img/razor_sb.png'
            ],
            [
                'fullname'=>'沙王',
                'alias_name' => 'sk,sw',
                'avatar' => '/img/sand_king_sb.png'
            ],
            [
                'fullname'=>'风暴之灵',
                'alias_name' => 'lm,ss,fbzl,dm',
                'avatar' => '/img/storm_spirit_sb.png'
            ],
            [
                'fullname'=>'斯温',
                'alias_name' => 'sven,lljk,ll',
                'avatar' => '/img/sven_sb.png'
            ],
            [
                'fullname'=>'小小',
                'alias_name' => 'tiny,xx',
                'avatar' => '/img/tiny_sb.png'
            ],
            [
                'fullname'=>'复仇之魂',
                'alias_name' => 'vs,fczh',
                'avatar' => '/img/vengefulspirit_sb.png'
            ],
            [
                'fullname'=>'风行者',
                'alias_name' => 'wr,fx,fxz',
                'avatar' => '/img/windrunner_sb.png'
            ],
            [
                'fullname'=>'宙斯',
                'alias_name' => 'zs,zues,sw',
                'avatar' => '/img/zuus_sb.png'
            ],
            [
                'fullname'=>'昆卡',
                'alias_name' => 'cz,kk,kunkka',
                'avatar' => '/img/kunkka_sb.png'
            ],
            [
                'fullname'=>'莉娜',
                'alias_name' => 'lina,hn',
                'avatar' => '/img/lina_sb.png'
            ],
            [
                'fullname'=>'巫妖',
                'alias_name' => 'wy,lich',
                'avatar' => '/img/lich_sb.png'
            ],
            [
                'fullname'=>'莱恩',
                'alias_name' => 'lion,le',
                'avatar' => '/img/lion_sb.png'
            ],
            [
                'fullname'=>'暗影萨满',
                'alias_name' => 'ss,aysm',
                'avatar' => '/img/shadow_shaman_sb.png'
            ],
            [
                'fullname'=>'斯拉达',
                'alias_name' => 'sld,yr,dy',
                'avatar' => '/img/slardar_sb.png'
            ],
            [
                'fullname'=>'潮汐猎人',
                'alias_name' => 'cxlr,th',
                'avatar' => '/img/tidehunter_sb.png'
            ],
            [
                'fullname'=>'巫医',
                'alias_name' => 'wy,wd',
                'avatar' => '/img/witch_doctor_sb.png'
            ],
            [
                'fullname'=>'力丸',
                'alias_name' => 'yc,riki',
                'avatar' => '/img/riki_sb.png'
            ],
            [
                'fullname'=>'谜团',
                'alias_name' => 'mt,enigma',
                'avatar' => '/img/enigma_sb.png'
            ],
            [
                'fullname'=>'修补匠',
                'alias_name' => 'tk,xbj,tinker',
                'avatar' => '/img/tinker_sb.png'
            ],
            [
                'fullname'=>'狙击手',
                'alias_name' => 'hq,jjs,sniper',
                'avatar' => '/img/sniper_sb.png'
            ],
            [
                'fullname'=>'瘟疫法师',
                'alias_name' => 'nec,wyfs',
                'avatar' => '/img/necrolyte_sb.png'
            ],
            [
                'fullname'=>'术士',
                'alias_name' => 'ss,wl,warlock',
                'avatar' => '/img/warlock_sb.png'
            ],
            [
                'fullname'=>'兽王',
                'alias_name' => 'sw,bm',
                'avatar' => '/img/beastmaster_sb.png'
            ],
            [
                'fullname'=>'痛苦女王',
                'alias_name' => 'nw,tknw,qop',
                'avatar' => '/img/queenofpain_sb.png'
            ],
            [
                'fullname'=>'剧毒术士',
                'alias_name' => 'jdss,jd',
                'avatar' => '/img/venomancer_sb.png'
            ],
            [
                'fullname'=>'虚空假面',
                'alias_name' => 'xk,void,fv,xkjm',
                'avatar' => '/img/faceless_void_sb.png'
            ],
            [
                'fullname'=>'冥魂大帝',
                'alias_name' => 'snk,sk,klw,mhdd',
                'avatar' => '/img/wraith_king_sb.png'
            ],
            [
                'fullname'=>'死亡先知',
                'alias_name' => 'dp,swxz',
                'avatar' => '/img/death_prophet_sb.png'
            ],
            [
                'fullname'=>'幻影刺客',
                'alias_name' => 'pa,hyck,hc',
                'avatar' => '/img/phantom_assassin_sb.png'
            ],
            [
                'fullname'=>'帕格纳',
                'alias_name' => 'gf,pugna,pgn',
                'avatar' => '/img/pugna_sb.png'
            ],
            [
                'fullname'=>'圣堂刺客',
                'alias_name' => 'ta,st,stck',
                'avatar' => '/img/templar_assassin_sb.png'
            ],
            [
                'fullname'=>'冥界亚龙',
                'alias_name' => 'vp,mjyl,viper,vip',
                'avatar' => '/img/viper_sb.png'
            ],
            [
                'fullname'=>'露娜',
                'alias_name' => 'luna,ln,yq',
                'avatar' => '/img/luna_sb.png'
            ],
            [
                'fullname'=>'龙骑士',
                'alias_name' => 'lq,dk',
                'avatar' => '/img/dragon_knight_sb.png'
            ],
            [
                'fullname'=>'戴泽',
                'alias_name' => 'dz',
                'avatar' => '/img/dazzle_sb.png'
            ],
            [
                'fullname'=>'发条技师',
                'alias_name' => 'ft,ftjs',
                'avatar' => '/img/rattletrap_sb.png'
            ],
            [
                'fullname'=>'拉席克',
                'alias_name' => 'ts,lxk,gl',
                'avatar' => '/img/leshrac_sb.png'
            ],
            [
                'fullname'=>'先知',
                'alias_name' => 'fur,xz',
                'avatar' => '/img/furion_sb.png'
            ],
            [
                'fullname'=>'噬魂鬼',
                'alias_name' => 'xg,shg,ssg',
                'avatar' => '/img/life_stealer_sb.png'
            ],
            [
                'fullname'=>'黑暗贤者',
                'alias_name' => 'ds,haxz',
                'avatar' => '/img/dark_seer_sb.png'
            ],
            [
                'fullname'=>'克林克兹',
                'alias_name' => 'gg,klkz',
                'avatar' => '/img/clinkz_sb.png'
            ],
            [
                'fullname'=>'全能骑士',
                'alias_name' => 'ok,qn,qnqs',
                'avatar' => '/img/omniknight_sb.png'
            ],
            [
                'fullname'=>'魅惑魔女',
                'alias_name' => 'xl,mhmn',
                'avatar' => '/img/enchantress_sb.png'
            ],
            [
                'fullname'=>'哈斯卡',
                'alias_name' => 'hsk,huskar',
                'avatar' => '/img/huskar_sb.png'
            ],
            [
                'fullname'=>'暗夜魔王',
                'alias_name' => 'ns,aymw',
                'avatar' => '/img/night_stalker_sb.png'
            ],
            [
                'fullname'=>'育母蜘蛛',
                'alias_name' => 'bm,ymzz,zz',
                'avatar' => '/img/broodmother_sb.png'
            ],
            [
                'fullname'=>'赏金猎人',
                'alias_name' => 'bh,sjlr',
                'avatar' => '/img/bounty_hunter_sb.png'
            ],
            [
                'fullname'=>'编织者',
                'alias_name' => 'my,bzz',
                'avatar' => '/img/weaver_sb.png'
            ],
            [
                'fullname'=>'杰奇洛',
                'alias_name' => 'jql,stl',
                'avatar' => '/img/jakiro_sb.png'
            ],
            [
                'fullname'=>'蝙蝠骑士',
                'alias_name' => 'bf,bat,bfqs',
                'avatar' => '/img/batrider_sb.png'
            ],
            [
                'fullname'=>'陈',
                'alias_name' => 'chen',
                'avatar' => '/img/chen_sb.png'
            ],
            [
                'fullname'=>'幽鬼',
                'alias_name' => 'ug,spe,yg',
                'avatar' => '/img/spectre_sb.png'
            ],
            [
                'fullname'=>'末日使者',
                'alias_name' => 'doom,mr,mrsz',
                'avatar' => '/img/doom_bringer_sb.png'
            ],
            [
                'fullname'=>'远古冰魄',
                'alias_name' => 'aa,ygbh',
                'avatar' => '/img/ancient_apparition_sb.png'
            ],
            [
                'fullname'=>'熊战士',
                'alias_name' => 'ursa,xz,pp,xzs,ppx',
                'avatar' => '/img/ursa_sb.png'
            ],
            [
                'fullname'=>'裂魂人',
                'alias_name' => 'bn,lhr,sb',
                'avatar' => '/img/spirit_breaker_sb.png'
            ],
            [
                'fullname'=>'矮人直升机',
                'alias_name' => 'arzsj,gc,fj',
                'avatar' => '/img/gyrocopter_sb.png'
            ],
            [
                'fullname'=>'炼金术士',
                'alias_name' => 'ga,lj,ljss',
                'avatar' => '/img/alchemist_sb.png'
            ],
            [
                'fullname'=>'祈求者',
                'alias_name' => 'zh,qqz,invoker,ke',
                'avatar' => '/img/invoker_sb.png'
            ],
            [
                'fullname'=>'沉默术士',
                'alias_name' => 'cmss,cm',
                'avatar' => '/img/silencer_sb.png'
            ],
            [
                'fullname'=>'殁境神蚀者',
                'alias_name' => 'hn,od,yjssz',
                'avatar' => '/img/obsidian_destroyer_sb.png'
            ],
            [
                'fullname'=>'狼人',
                'alias_name' => 'ly,lr,lycan',
                'avatar' => '/img/lycan_sb.png'
            ],
            [
                'fullname'=>'酒仙',
                'alias_name' => 'xm,jx',
                'avatar' => '/img/brewmaster_sb.png'
            ],
            [
                'fullname'=>'暗影恶魔',
                'alias_name' => 'ayem,sd,dg',
                'avatar' => '/img/shadow_demon_sb.png'
            ],
            [
                'fullname'=>'德鲁伊',
                'alias_name' => 'ld,dly',
                'avatar' => '/img/lone_druid_sb.png'
            ],
            [
                'fullname'=>'混沌骑士',
                'alias_name' => 'ck,hdqs',
                'avatar' => '/img/chaos_knight_sb.png'
            ],
            [
                'fullname'=>'米波',
                'alias_name' => 'mb,meepo',
                'avatar' => '/img/meepo_sb.png'
            ],
            [
                'fullname'=>'树精卫士',
                'alias_name' => 'ds,sjws',
                'avatar' => '/img/treant_sb.png'
            ],
            [
                'fullname'=>'食人魔魔法师',
                'alias_name' => 'srmfs,om',
                'avatar' => '/img/ogre_magi_sb.png'
            ],
            [
                'fullname'=>'不朽尸王',
                'alias_name' => 'sw,ud,bxsw',
                'avatar' => '/img/undying_sb.png'
            ],
            [
                'fullname'=>'拉比克',
                'alias_name' => 'lbk,rubick',
                'avatar' => '/img/rubick_sb.png'
            ],
            [
                'fullname'=>'干扰者',
                'alias_name' => 'se,grz',
                'avatar' => '/img/disruptor_sb.png'
            ],
            [
                'fullname'=>'司夜刺客',
                'alias_name' => 'xq,syck,na',
                'avatar' => '/img/nyx_assassin_sb.png'
            ],
            [
                'fullname'=>'娜迦海妖',
                'alias_name' => 'njhy,nj,naga,xnj',
                'avatar' => '/img/naga_siren_sb.png'
            ],
            [
                'fullname'=>'光之守卫',
                'alias_name' => 'gf,gs,gzsw',
                'avatar' => '/img/keeper_of_the_light_sb.png'
            ],
            [
                'fullname'=>'艾欧',
                'alias_name' => 'io,ao',
                'avatar' => '/img/wisp_sb.png'
            ],
            [
                'fullname'=>'维萨吉',
                'alias_name' => 'vsj,visage',
                'avatar' => '/img/visage_sb.png'
            ],
            [
                'fullname'=>'斯拉克',
                'alias_name' => 'xy,slk,slark',
                'avatar' => '/img/slark_sb.png'
            ],
            [
                'fullname'=>'美杜莎',
                'alias_name' => 'med,mds,dnj,nj',
                'avatar' => '/img/medusa_sb.png'
            ],
            [
                'fullname'=>'巨魔战将',
                'alias_name' => 'jm,tw,jmzj',
                'avatar' => '/img/troll_warlord_sb.png'
            ],
            [
                'fullname'=>'半人马战行者',
                'alias_name' => 'rm,brmzxz',
                'avatar' => '/img/centaur_sb.png'
            ],
            [
                'fullname'=>'马格纳斯',
                'alias_name' => 'mgns,mag',
                'avatar' => '/img/magnataur_sb.png'
            ],
            [
                'fullname'=>'伐木机',
                'alias_name' => 'fmj',
                'avatar' => '/img/shredder_sb.png'
            ],
            [
                'fullname'=>'钢背兽',
                'alias_name' => 'gbs,gb',
                'avatar' => '/img/bristleback_sb.png'
            ],
            [
                'fullname'=>'巨牙海民',
                'alias_name' => 'hm,jyhm,tusk',
                'avatar' => '/img/tusk_sb.png'
            ],
            [
                'fullname'=>'天怒法师',
                'alias_name' => 'tn,tnfs,sm',
                'avatar' => '/img/skywrath_mage_sb.png'
            ],
            [
                'fullname'=>'亚巴顿',
                'alias_name' => 'dk,ybd',
                'avatar' => '/img/abaddon_sb.png'
            ],
            [
                'fullname'=>'上古巨神',
                'alias_name' => 'dn,sgjs,et',
                'avatar' => '/img/elder_titan_sb.png'
            ],
            [
                'fullname'=>'军团指挥官',
                'alias_name' => 'lc,jt,jtzhg',
                'avatar' => '/img/legion_commander_sb.png'
            ],
            [
                'fullname'=>'灰烬之灵',
                'alias_name' => 'hm,es,hjzl',
                'avatar' => '/img/ember_spirit_sb.png'
            ],
            [
                'fullname'=>'大地之灵',
                'alias_name' => 'dd,tm,es,ddzl',
                'avatar' => '/img/earth_spirit_sb.png'
            ],
            [
                'fullname'=>'恐怖利刃',
                'alias_name' => 'tb,kblr,hs',
                'avatar' => '/img/terrorblade_sb.png'
            ],
            [
                'fullname'=>'凤凰',
                'alias_name' => 'fh',
                'avatar' => '/img/phoenix_sb.png'
            ],
            [
                'fullname'=>'神谕者',
                'alias_name' => 'sy,syz',
                'avatar' => '/img/oracle_sb.png'
            ],
            [
                'fullname'=>'工程师',
                'alias_name' => 'zd,zdr,gcs',
                'avatar' => '/img/techies_sb.png'
            ],
            [
                'fullname'=>'寒冬飞龙',
                'alias_name' => 'bl,hdfl',
                'avatar' => '/img/winter_wyvern_sb.png'
            ],
            [
                'fullname'=>'天穹守望者',
                'alias_name' => 'dg,tqswz',
                'avatar' => '/img/arc_warden_sb.png'
            ],
            [
                'fullname'=>'齐天大圣',
                'alias_name' => 'ds,qtds,hz',
                'avatar' => '/img/monkey_king_sb.png'
            ],
            [
                'fullname'=>'孽主',
                'alias_name' => 'dpg,nz,sylz',
                'avatar' => '/img/abyssal_underlord_sb.png'
            ],

        ];

        foreach ($heroesData as $oneRow) {
            factory(\App\Hero::class, 1)->create([
                'fullname' => $oneRow['fullname'],
                'alias_name' => $oneRow['alias_name'],
                'avatar' => $oneRow['avatar'],
            ]);
        }
    }
}
