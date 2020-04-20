@extends('layout')
@section('content')
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1 class="text-center">Register</h1>
              
              <form class="form-controll" method="post" action="">
                @csrf

              <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg></span></div>
                <input class="form-control" type="text" placeholder="Username" name="username">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                    </svg></span></div>
                <input class="form-control" type="text" placeholder="Email" name="email">
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                    </svg></span></div>
                <input class="form-control" type="password" placeholder="Password" name="password">
              </div>

              <div class="input-group mb-4">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                    </svg></span></div>
                <input class="form-control" type="password" placeholder="Repeat password" name="repeat_password">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
                 </div>
            </form>

              <a class="btn btn-block btn-info" href="{{route('admin')}}">Home Page</a>
            </div>
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <a class="btn btn-block btn-info"  href="{{route('admin.500')}}">500</a>
                </div>
                <div class="col-6">
                  <a class="btn btn-block btn-info"  href="{{route('admin.404')}}">404</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection