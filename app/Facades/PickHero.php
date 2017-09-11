<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PickHero extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PickHeroService';
    }
}