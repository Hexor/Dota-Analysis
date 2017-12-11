<?php
namespace App\Services;

use App\Hero;
use App\HeroCooperate;
use App\HeroCounter;


class PickHeroService
{
    protected $teammateList;
    protected $enemyList;
    protected $targetHero;

    protected $pointFactor = [
        '1_to_5' => 2,
        'tank' => 3,
        'stun' => 2,
        'push' => 1,
        'initiator' => 2,
        'mass_stun' => 3
    ];



    private function sortByTotalPoint($a, $b)
    {
        if ($a->total_point == $b->total_point) {
            return 0;
        }
        return ($a->total_point > $b->total_point) ? -1 : 1;
    }

    public function getCalculatedHeroList($teammateIDList, $enemyIDList)
    {

        $this->teammateList = $this->transID2HeroModelList($teammateIDList);
        $this->enemyList = $this->transID2HeroModelList($enemyIDList);

        $calculatedHeroList = [];
        foreach ($this->getRemainHeroList($teammateIDList, $enemyIDList) as $targetHero) {

            $this->targetHero = $targetHero;
            $calculatedHero = $targetHero;

            $calculatedHero->detail = [
                'counter' => $this->getCounterPoint(),
                'cooporate' => $this->getCooperatePoint(),
                'early_battle' => $this->getEarlyBattlePoint(),
                'carry' => $this->getCarryPoint(),
                'disabler' => $this->getDisablerPoint(),
                'initiator' => $this->getInitiatorPoint(),
                'gank' => $this->getGankPoint(),
                'support' => $this->getSupportPoint(),
                'tank' => $this->getTankPoint(),
//                    'push' => $this->getPushPoint(),
//                    'mass_stun' => $this->getMassStunPoint(),
//                    'savior' => $this->getSaviorPoint(),
//                    'againest_hero' => $this->getAgainestHeroPoint(),
//                    'againest_team_type' => $this->getAgainestTeamTypePoint(),
            ];

            $calculatedHero->total_point = $this->getOneCalculatedHeroTotalPoint($calculatedHero);

            $calculatedHeroList[] = $calculatedHero;
        }

        usort($calculatedHeroList, array( $this, 'sortByTotalPoint'));

        return $calculatedHeroList;
    }

    private function getRemainHeroList($teammateList, $enemyList)
    {
        $teammateID = [];
        foreach ($teammateList as $id) {
            $teammateID[] = $id;
        }

        $enemyID = [];
        foreach ($enemyList as $id) {
            $enemyID[] = $id;
        }

        $except = array_merge($teammateID, $enemyID);

        return Hero::whereNotIn('id', $except)->get();
    }

    private function getOneCalculatedHeroTotalPoint($calculatedHero)
    {
        $total = 0;
        foreach ($calculatedHero->detail as $pointType => $point) {
            $total += $point;
        }

        return $total;
    }

    /**
     *
     * 肉的能力 即 tank_ability, 并不是只有肉盾才有这个分数, 这个分数使用来描述一个英雄肉的能力, 比如帕格纳为1, 刚被为5, 而兽王为3
     * @return float|int
     */
    private function getTankPoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        //第一步, 计算己方tank分数
        $total = 0;
        $max = 0;
        $index = 0;

        foreach ($tempTeammates as $teammate) {
            $index += 1;
            $total += $teammate->ability_tank;

            if ($teammate->ability_tank > $max) {
                $max = $teammate->ability_tank;
            }
        }

        $average = $total/$index;

        if ($average >= 3 && $max > 4) {
            $result = 5;
        } else if ($average >= 2 && $max > 3) {
            $result = 4;
        } else if ($average >= 1.6 && $max > 2) {
            $result = 3;
        } else if ($average > 0.5 && $max > 1.6) {
            $result = 2;
        } else {
            $result = 1;
        }

        //第二步, 根据敌方的反gank能力, 对第一步的分数进行修正

        $total = 0;
        $max = 0;
        $index = 0;
        foreach ($this->enemyList as $enemy) {
            $index += 1;
            $total += $enemy->counter_tank;

            if ($enemy->counter_tank > $max) {
                $max = $enemy->counter_tank;
            }
        }
        $average = $total/$index;

        $fixedResult = 1;
        if ($average > 2) {
            $fixedResult = 2;
        } else if ($average > 1) {
            $fixedResult = 1.5;
        }

        $result = number_format($result/$fixedResult, 2);

        if ($result < 0) {
            $result = 1;
        }

        return $result;
    }

    private function getStunPoint()
    {
        return 0;
    }

    private function getPushPoint()
    {
        return 0;
    }

    /**
     * 计算英雄的先手能力
     *
     * 这里同样不把敌方反先手的分数作为重点权重加入到计算中, 因为想要把系统尽量做的简单一些
     *
     * 在敌方拥有很好的先手英雄时, 我们当然就应该选择一些反先手的英雄, 对于这样的情况, 我们暂时交给另外的英雄克制函数去完成把
     *
     * @return int
     */
    private function getInitiatorPoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        $total = 0;
        $max = 0;
        $index = 0;

        foreach ($tempTeammates as $teammate) {
            $index += 1;
            $total += $teammate->ability_initiator;

            if ($teammate->ability_initiator > $max) {
                $max = $teammate->ability_initiator;
            }
        }

        $average = $total/$index;

        if ($average >= 3 && $max > 4) {
            $result = 5;
        } else if ($average >= 2 && $max > 3) {
            $result = 4;
        } else if ($average >= 1.6 && $max > 2) {
            $result = 3;
        } else if ($average > 0.5 && $max > 1.6) {
            $result = 2;
        } else {
            $result = 1;
        }

        return $result;
    }

    private function getMassStunPoint()
    {
        return 0;
    }

    private function getSaviorPoint()
    {
        return 0;
    }

    private function getAgainestHeroPoint()
    {
        return 0;
    }

    private function getAgainestTeamTypePoint()
    {
        return 0;
    }

    /**
     * 计算gank相关分数
     */
    private function getGankPoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        //第一步, 计算己方gank分数
        $total = 0;
        $max = 0;
        $index = 0;

        foreach ($tempTeammates as $teammate) {
            $index += 1;
            $total += $teammate->ability_gank;

            if ($teammate->ability_gank > $max) {
                $max = $teammate->ability_gank;
            }
        }

        $average = $total/$index;

        if ($average >= 3 && $max > 4) {
            $result = 5;
        } else if ($average >= 2 && $max > 3) {
            $result = 4;
        } else if ($average >= 1.6 && $max > 2) {
            $result = 3;
        } else if ($average > 0.5 && $max > 1.6) {
            $result = 2;
        } else {
            $result = 1;
        }

        //第二步, 根据敌方的反gank能力, 对第一步的分数进行修正

        $fixedResult = 0;
        $total = 0;
        $max = 0;
        $index = 0;
        foreach ($this->enemyList as $enemy) {
            $index += 1;
            $total += $enemy->counter_gank;

            if ($enemy->counter_gank > $max) {
                $max = $enemy->counter_gank;
            }
        }
        $average = $total/$index;

        if ($average > 4) {
            $fixedResult = -2;
        } else if ($average > 3) {
            $fixedResult = -1.5;
        } else if ($average > 2) {
            $fixedResult = -1;
        } else if ($average > 1) {
            $fixedResult = -0.5;
        }

        $result += $fixedResult;

        if ($result < 0) {
            $result = 1;
        }

        return $result;

    }

    /**
     * 把 Hero 的id数组 转换为 Hero 的模型数组
     * @param $teammateIDList
     */
    private function transID2HeroModelList($teammateIDList)
    {
        $heroes = [];
        foreach ($teammateIDList as $id) {
           $heroes[] = Hero::find($id);
        }

        return $heroes;
    }

    /**
     * 计算辅助相关的分数,肉的能力 即 tank_ability, 并不是只有肉盾才有这个分数, 这个分数使用来描述一个英雄肉的能力, 比如帕格纳为1, 刚被为5, 而兽王为3
     */
    private function getSupportPoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        $above3Count = 0;
        $above2Count = 0;
        foreach ($tempTeammates as $teammate) {

            if ($teammate->ability_support > 3) {
                $above3Count++;
            }

            if ($teammate->ability_support > 2) {
                $above2Count++;
            }
        }


        // 只要有2个大于3分以上的英雄, 即评为5分
        if ($above3Count >= 2) {
            $result = 5;
        } else if ($above3Count >= 1) {
            $result = 4;
        } else if ($above2Count >= 2) {
            $result = 3;
        } else if ($above2Count >= 1) {
            $result = 2;
        } else {
            $result = 1;
        }

        return $result;
    }

    /**
     * 计算控场相关的分数,游戏中表现为留人的能力
     */
    private function getDisablerPoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        //第一步, 计算己方控场分数
        $total = 0;
        $max = 0;
        $index = 0;

        foreach ($tempTeammates as $teammate) {
            $index += 1;
            $total += $teammate->ability_disabler;

            if ($teammate->ability_disabler > $max) {
                $max = $teammate->ability_disabler;
            }
        }

        $average = $total/$index;

        if ($average >= 3 && $max > 4) {
            $result = 5;
        } else if ($average >= 2 && $max > 3) {
            $result = 4;
        } else if ($average >= 1.6 && $max > 2) {
            $result = 3;
        } else if ($average > 0.5 && $max > 1.6) {
            $result = 2;
        } else {
            $result = 1;
        }

        return $result;
    }

    /**
     * 计算队伍的前期战斗能力
     * 前期战斗能力, 也可以被理解成为对线的能力, 即 early_battle,
     * 在这里是否还需要考虑到对方的能力? 对方选择的英雄会不会对我方的前期战斗力的能力造成影响?
     * 考虑这个会影响到计算的复杂性, 暂且先不考虑
     * 1-5分的评判标准 在不同的能力中可能有不同的体现, 比如在对线能力这一项中,

     */
    private function getEarlyBattlePoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        //第一步, 计算己方控场分数
        $total = 0;
        $max = 0;
        $index = 0;

        foreach ($tempTeammates as $teammate) {
            $index += 1;
            $total += $teammate->ability_early_battle;

            if ($teammate->ability_early_battle > $max) {
                $max = $teammate->ability_early_battle;
            }
        }

        $average = $total/$index;

        if ($average >= 3 && $max > 4) {
            $result = 5;
        } else if ($average >= 2 && $max > 3) {
            $result = 4;
        } else if ($average >= 1.6 && $max > 2) {
            $result = 3;
        } else if ($average > 0.5 && $max > 1.6) {
            $result = 2;
        } else {
            $result = 1;
        }

        return $result;
    }

    /**
     * 计算队伍的后期能力
     * 计算队伍的后期能力, ability_carry, 对于后期的要求来说, 要求暂时定为以下的几点,

     * 1. 有后期
     * 2. 后期不能太多
     *
     * 所以制定这样的标准, 定为 一个5分后期和一个3分后期 或者 两个4分后期 为最优
     * 第二优的标准为, 4+3 的组合
     * 第三优的标准为, 3+3 的组合, 或者 5+5 的组合
     * 第四优的标准为, 总分大于15分
     * 剩余为最差的评分 1分
     *
     */
    private function getCarryPoint()
    {
        $result = 0;

        $tempTeammates = $this->teammateList;
        $tempTeammates[] = $this->targetHero;

        $point5Count = 0;
        $point4Count = 0;
        $point3Count = 0;
        $max = 0;

        $total = 0;

        foreach ($tempTeammates as $teammate) {

            $total += $teammate->ability_carry;

            if ($teammate->ability_carry > $max) {
                $max = $teammate->ability_carry;
            }

            if ($teammate->ability_carry == 5) {
                $point5Count ++;
            }
            if ($teammate->ability_carry == 4) {
                $point4Count ++;
            }
            if ($teammate->ability_carry == 3) {
                $point3Count ++;
            }
        }

        if ($point5Count == 1 && $point3Count == 1 && $total <= 14) {
            $result = 5;
        } elseif ($point4Count == 2 && $total <= 14) {
            $result = 5;
        } elseif ($point4Count == 1 && $point3Count == 1 && $total <= 13) {
            $result = 4;
        } elseif (
            ($total <= 8 || $total >= 20) &&
            ($max < 4)
        ) {
            $result = 1;
        } else {
            $result = 3;
        }

        return $result;
    }

    /**
     * 计算双方英雄的克制得分
     * 同样我们使用比较简单的计算方法, 即
     * 在不被对方英雄克制的前提下, 尽量克制对方的英雄
     *
     * 1. 得到这个英雄对对方英雄的克制point
     * 2. 得到这个英雄被对方英雄的克制point
     * 3. 用1和2中的point 进行相应处理, 得出最终point
     */
    private function getCounterPoint()
    {
        $result = 0;


        // 第一步: 得到这个英雄对对方英雄的克制point
        // 该point的评判标准为
        // 3分: 有2个或2个以上的3分
        // 2分: 有2个或2个以上的2分
        // 1分: 总分大于等于5
        $counterPoint = 0;

        $targetHero = $this->targetHero;

        $point3Count = 0;
        $point2Count = 0;
        $total = 0;
        foreach ($this->enemyList as $enemy) {
            $oneCounterPoint = 0;

            $counter = HeroCounter::where([
                ['hero_id', '=', $targetHero->id],
                ['countered_hero_id', '=', $enemy->id]
            ])->first();

            if ($counter) {
                // 该变量可能的值只有 1,2,3
                $oneCounterPoint = $counter->point;
            }

            $total += $oneCounterPoint;

            if ($oneCounterPoint == 3) {
                $point3Count ++;
            }
            if ($oneCounterPoint == 2) {
                $point2Count ++;
            }
        }

        if ($point3Count >= 2) {
            $counterPoint = 3;
        } elseif ($point2Count >=2) {
            $counterPoint = 2;
        } elseif ($total >= 2) {
            $counterPoint = 1;
        }

        //第二步:得到这个英雄被对方英雄的克制point

        $counteredPoint = 0;


        $point3Count = 0;
        $point2Count = 0;
        $total = 0;
        foreach ($this->enemyList as $enemy) {
            $oneCounterPoint = 0;

            $counter = HeroCounter::where([
                    ['hero_id', '=', $enemy->id],
                    ['countered_hero_id', '=', $targetHero->id]
            ])->first();

            if ($counter) {
                // 该变量可能的值只有 1,2,3
                $oneCounterPoint = $counter->point;
            }

            $total += $oneCounterPoint;

            if ($oneCounterPoint == 3) {
                $point3Count ++;
            }
            if ($oneCounterPoint == 2) {
                $point2Count ++;
            }
        }

        if ($point3Count >= 2) {
            $counteredPoint = 3;
        } elseif ($point2Count >=2) {
            $counteredPoint = 2;
        } elseif ($total >= 5) {
            $counteredPoint = 1;
        }

        $result = $counterPoint - $counteredPoint;

        $result = $result * 4;


        return $result;
    }

    private function getCooperatePoint()
    {
        $result = 0;

        $targetHero = $this->targetHero;

        $point3Count = 0;
        $point2Count = 0;
        $total = 0;

        foreach ($this->teammateList as $teammate) {
            if ($teammate->id > $targetHero->id) {
                $heroAID = $targetHero->id;
                $heroBID = $teammate->id;
            } else {
                $heroAID = $teammate->id;
                $heroBID = $targetHero->id;
            }

            $oneCoopratePoint = 0;

            $oneCooprate = HeroCooperate::where([
                ['a_hero_id', '=', $heroAID],
                ['b_hero_id', '=', $heroBID]
            ])->first();

            if ($oneCooprate) {
                $oneCoopratePoint = $oneCooprate->point;
            }

            $total = $total + $oneCoopratePoint;

            if ($oneCoopratePoint == 3) {
                $point3Count ++;
            }
            if ($oneCoopratePoint == 2) {
                $point2Count ++;
            }
        }

        if ($point3Count >= 2) {
            $result = 3;
        } elseif ($total >= 4) {
            $result = 2;
        } elseif ($total > 0) {
            $result = 1;
        }

        return $result*2;

    }

}