<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Http\Requests\Loginvalidation;
use Illuminate\Support\Facades\Auth;
use APP\Admin;




class AdminLoginController extends Controller
{
    

    public function __construct()
    {
       $this->middleware('guest:admin')->except('logout');
    }
      
    protected function create()
    {
        return view('auth.AdminLogin');   
    }



    protected function Admlogin (Request $request)
    {
        $credentials = $request->only('email', 'password');
          //Config::get('auth.defaults.guard');
        //dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
          
            return redirect()->intended('/admin');
        }
        if ( ! Admin::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['email' => [trans('auth.email')],
                ]);
        }
        if ( ! Admin::where('password', $request->password)->first() ) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['password' => [trans('auth.password')],
                ]);
        }  
        
        
    }


    protected function logout()
    {
        Auth::logout();
        return redirect(route('welcome'));
            
    }
}
