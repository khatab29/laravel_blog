<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterValidation;
use App\User;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    
    protected function create()
    {
        return view('auth.register');
            
    }

    protected function store(RegisterValidation $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name' => $request['name'],
            'email' =>$request['email'],
            'password'=>Hash::make($request['password']),
            ]);
        auth()->login($user);
        return redirect(route('welcome'));
    }



}
