<?php
namespace App\Services;

use App\Hero;



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
        if ($a['total_point'] == $b['total_point']) {
            return 0;
        }
        return ($a['total_point'] > $b['total_point']) ? -1 : 1;
    }

    public function getCalculatedHeroList($teammateList, $enemyList)
    {

        $this->teammateList = $teammateList;
        $this->enemyList = $enemyList;

        $calculatedHeroList = [];
        foreach ($this->getRemainHeroList() as $targetHero) {

            $this->targetHero = $targetHero;

            $calculatedHero = [
                'id' => $targetHero->id,
                'name' => $targetHero->fullname,
                'detail' => [
                    '1_to_5' => $this->getOneToFivePositionPoint(),
                    'tank' => $this->getTankPoint(),
                    'stun' => $this->getStunPoint(),
                    'push' => $this->getPushPoint(),
                    'initiator' => $this->getInitiatorPoint(),
                    'mass_stun' => $this->getMassStunPoint(),
                    'savior' => $this->getSaviorPoint(),
                    'againest_hero' => $this->getAgainestHeroPoint(),
                    'againest_team_type' => $this->getAgainestTeamTypePoint(),
                ]
            ];

            $calculatedHero['total_point'] = $this->getOneCalculatedHeroTotalPoint($calculatedHero);

            $calculatedHeroList[] = $calculatedHero;
        }

        usort($calculatedHeroList, array( $this, 'sortByTotalPoint'));

        return $calculatedHeroList;
    }

    private function getRemainHeroList()
    {
        $teammateID = [];
        foreach ($this->teammateList as $id) {
            $teammateID[] = $id;
        }

        $enemyID = [];
        foreach ($this->enemyList as $id) {
            $enemyID[] = $id;
        }

        $except = array_merge($teammateID, $enemyID);

        return Hero::whereNotIn('id', $except)->get();
    }

    private function getOneCalculatedHeroTotalPoint($calculatedHero)
    {
        $total = 0;
        foreach ($calculatedHero['detail'] as $pointType => $point) {
            $total += $point;
        }

        return $total;
    }

    private function getOneToFivePositionPoint()
    {
        return rand(1,100);
    }

    private function getTankPoint()
    {
        return 0;
    }

    private function getStunPoint()
    {
        return 0;
    }

    private function getPushPoint()
    {
        return 0;
    }

    private function getInitiatorPoint()
    {
        return 0;
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

}