@extends('layouts.admin')
@section('content')

<body class="c-app flex-row align-items-center">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="dropdown show ">
                <a class="btn   btn-sm dropdown-toggle" href="#" 
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
              <div class="card-body">

                <h1>{{__('Login')}}</h1>
                <p class="text-muted">Admin Only Login</p>

<form method="POST" action="{{ route('admin.submit') }}">
@csrf

<div class="input-group mb-3">
<div class="input-group-prepend"><span class="input-group-text">
<svg class="c-icon">
<use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
</svg></span></div>
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="{{__('E-mail')}}">
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
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="{{__('Password')}}">
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
<button class="btn btn-primary px-4" type="submit" name="admin-submit">{{__('Login')}}</button>
</div>
<div class="col-6 text-right">
  <a  href="{{ route('admin.password.request') }}" ><span>{{__('Forgot Your Password?')}}</span></a>

</div>
</div>
</form>
              </div>
            </div>
       

        </div>
      </div>
    </div>
   @endsection

   