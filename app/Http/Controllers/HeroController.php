<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::select([
//            'id',
            'fullname',
            'alias_name',
            'avatar',
        ])->get();

        return Datatables::of($heroes)
//        ->addColumn('edit', function ($hero) {
//            return '<a href="/qr/'.$user->email.'/edit" class="btn btn-primary btn-info"><i class="fa fa-edit"></i>编辑</a>';
//        })
//        ->removeColumn('id')
//        ->removeColumn('avatar')
            ->make(true);

    }
}
