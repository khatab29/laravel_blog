<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home($lang = null)
    {

        if(!in_array($lang , config('app.locales'))){
            \App::setlocale(request()->cookie('lang')?: config('app.fallback_locale'));
        }
        
                  return view('welcome');
    }
}
