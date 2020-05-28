@extends('layouts.admin')
@section('content')
<body class="c-app flex-row align-items-center">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="dropdown show float ">
              <a class="btn btn-sm dropdown-toggle" href="#" 
              role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Languages
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
              </div>
            </div>
            <div class="card-body p-4">
              <h1>{{__('register.Register')}}</h1>
              <p class="text-muted">{{__('register.Create your account')}}</p>
<form method="POST" action="{{ route('register') }}">
@csrf

<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
</svg></span></div>
<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="{{__('Name')}}">

@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
</svg></span></div>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="{{__('E-mail')}}">

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
</svg></span></div>
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="{{__('Password')}}">

@error('password')
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
<input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="{{__('Password Confirmation')}}">
</div>

<button type="submit" class="btn btn-primary btn-block">
{{__('register.Register')}}
</button>
</div>
</form>

            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <a class="btn btn-block btn-primary" href="{{route('login')}}"><span>{{__('Login')}}</span></a>
                </div>
                <div class="col-6">
                  <a class="btn btn-block btn-primary" href="{{ route('password.request') }}" ><span>{{__('Forgot Your Password?')}}</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endsection