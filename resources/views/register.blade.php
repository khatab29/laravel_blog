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
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1 class="text-center">Register</h1>
              
        <form class="form-controll" method="post" action="">
        @csrf
        @error('firstname')
        <span class="alert alert-danger" role="alert">{{$message}}</span>
        @enderror
        <div class="input-group mb-3 {{$errors->has('firstname') ? ' alert alert-danger' : ''}}">
        <div class="input-group-prepend"><span class="input-group-text ">
        <svg class="c-icon">
        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
        </svg></span></div>
        <input class="form-control " type="text" placeholder="First Name" name="firstname" value="{{old('firstname')}}">
        </div>
        @error('lastname')
        <span class="alert alert-danger" role="alert">{{$message}}</span>
        @enderror
        <div class="input-group mb-3 {{$errors->has('firstname') ? ' alert alert-danger' : ''}}">
        <div class="input-group-prepend"><span class="input-group-text">
        <svg class="c-icon">
        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
        </svg></span></div>
        <input class="form-control" type="text" placeholder="Last Name" name="lastname" value="{{old('lastname')}}">
        </div>
        @error('email')
        <span class="alert alert-danger" role="alert" >{{$message}}</span>
        @enderror
        <div class="input-group mb-3 {{$errors->has('firstname') ? ' alert alert-danger' : ''}}">
        <div class="input-group-prepend"><span class="input-group-text">
        <svg class="c-icon">
        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
        </svg></span></div>
        <input class="form-control" type="text" placeholder="Email" name="email" value="{{old('email')}}">
        </div>
        @error('password')
        <span class="alert alert-danger" role="alert">{{$message}}</span>
        @enderror
        <div class="input-group mb-3 {{$errors->has('firstname') ? ' alert alert-danger' : ''}}">
        <div class="input-group-prepend"><span class="input-group-text">
        <svg class="c-icon">
        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
        </svg></span></div>
        <input class="form-control" type="password" placeholder="Password" 
        name="password" value="{{old('password')}}">
        </div>
        @error('repeatPassword')
        <span class="alert alert-danger" role="alert">{{$message}}</span>
        @enderror
        <div class="input-group mb-4 {{$errors->has('firstname') ? ' alert alert-danger' : ''}}">
        <div class="input-group-prepend"><span class="input-group-text">
        <svg class="c-icon">
        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
        </svg></span></div>
        <input class="form-control" type="password" placeholder="Repeat password" name="repeatPassword" value="{{old('repeatPassword')}}">
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" value="Submit">
        </div>
        </form>
        </div>
        
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <a class="btn btn-block btn-info"  href="{{route('admin.login',app()->getlocale())}}">Login</a>
                </div>
                <div class="col-6">
                  <a class="btn btn-block btn-info"  href="{{route('admin.forgotPassword',app()->getlocale())}}">Forgot your password</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection