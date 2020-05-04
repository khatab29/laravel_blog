<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Loginvalidation;
use Illuminate\Support\Facades\Auth;
use App\User;







class LoginController extends Controller
{

     
    protected function create()
    {
        return view('auth.login');   
    }



    protected function login (Loginvalidation $request)
    {
        $validated = $request->validated();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('welcome'));
        }
        if ( ! User::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => [trans('auth.email')],
                ]);
        }
        if ( ! User::where('email', $request->email)->where('password', $request->password)->first() ) {
            return redirect()->back()
                ->withInput($request->only('password', 'remember'))
                ->withErrors([
                    'password' => [trans('auth.password')],
                ]);
        }  
    }


    protected function logout()
    {
        Auth::logout();
        return redirect(route('welcome'));
            
    }


    




}
