@extends('layout')
@section('content')
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>Forgot Your Password</h1>
              <p class="text-muted">Please enter your UserName and e-mail below. you will receive a link to create a new password via e-mail </p>
              <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span></div>
                <input class="form-control" type="text" placeholder="Username">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend"><span class="input-group-text">
                    <svg class="c-icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg></span></div>
   
                <input class="form-control" type="text" placeholder="Email">
              </div>
              <button class="btn btn-block btn-success" type="button" onclick="window.location='/'">Get New Password</button>
            </div>
          
          </div>
        </div>
      </div>
    </div>
   

@endsection