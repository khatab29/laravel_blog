<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CookieController extends Controller
{
    public function setlangCookie(Request $request)
    {
        $minutes = 200;
        $response = new Response(request('lang'));
        $response->withCookie(cookie('lang', request('lang'), $minutes));
        return  $response;
    }
    

    











}



