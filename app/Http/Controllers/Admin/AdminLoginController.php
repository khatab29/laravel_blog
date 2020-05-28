<?php

namespace App\Http\Controllers\admin;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
   /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
       $this->middleware('guest:admin')->except('logout');
    }
      

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    


    public function adminLoginForm()
    {
        return view('admin.AdminLogin');

    }



    protected function Adminlogin (LoginValidation $request)
    {
        $validated = $request->validated();
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput()
        ->withErrors(['password' => [trans('auth.password')],
        ]);

    }







}
