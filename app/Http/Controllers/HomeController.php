<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yuansir\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Toastr::error('你好啊','标题');
        return view('home');
    }
}
