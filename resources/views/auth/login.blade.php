@extends('layouts.admin')
@section('content')


    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">

            <ul class="navbar-nav">
      <li class="nav-item">
        <a  href="{{route(Route::currentRouteName(),'en')}}">English</a>|
        <a  href="{{route(Route::currentRouteName(),'ar')}}">العربية</a>
      </li>
    </ul>
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>{{__('login.Login')}}</h1>
                <p class="text-muted">{{__('login.Sign In to your account')}}</p>

<form method="POST" action="{{ route('login',app()->getlocale()) }}">
@csrf

<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
</svg></span></div>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__('E-mail')}}">
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="input-group mb-4">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
</svg></span></div>
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{__('Password')}}">
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>


<div class="form-check">
<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
<label class="form-check-label" for="remember">
{{ __('Remember Me') }}
</label>
</div>



<div class="row">
<div class="col-6">
<button class="btn btn-primary px-4" type="submit">{{__('login.Login')}}</button>
</div>
<div class="col-6 text-right">
@if (Route::has('password.request'))
<a class="btn btn-link" href="{{ route('password.request',app()->getlocale()) }}">
{{ __('Forgot Your Password?') }}
</a>
@endif
</div>
</div>
</form>


              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>{{__('login.Sign up')}}</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a class="btn btn-lg btn-outline-light mt-3" href="{{route('register',app()->getlocale())}}">{{__('login.Register Now!')}}</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endsection