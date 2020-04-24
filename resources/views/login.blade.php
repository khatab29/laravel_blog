@extends('layout')
@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route(Route::currentRouteName(),'en')}}">English</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route(Route::currentRouteName(),'ar')}}">Arabic</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>{{__('messages.Login')}}</h1>
                <p class="text-muted">{{__('messages.Sign In to your account')}}</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend"><span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                      </svg></span></div>
                  <input class="form-control" type="text" placeholder="Username">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend"><span class="input-group-text">
                      <svg class="c-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                      </svg></span></div>
                  <input class="form-control" type="password" placeholder="Password">
                </div>
                <div class="row">
                  <div class="col-6">
                      <a class="btn btn-primary px-4" href="{{route('admin',app()->getlocale())}}">{{__('messages.Login')}}</a>
                  </div>
                  <div class="col-6 text-right">
                    <a href="{{route('admin.forgotPassword',app()->getlocale())}}">{{__('messages.Forgot password?')}}</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>{{__('messages.Sign up')}}</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <a class="btn btn-lg btn-outline-light mt-3" href="{{route('admin.register',app()->getlocale())}}">{{__('messages.Register Now')}}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
   
@endsection