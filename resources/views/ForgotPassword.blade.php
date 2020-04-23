@extends('layout')
@section('content')
  <div class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
              <h1>Forgot Your Password</h1>
              <p class="text-muted">Please enter your UserName and e-mail below. you will receive a link to create a new password via e-mail </p>


             <div class="container">
              <form class="form-group" action="" method="post">
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
              <a class="btn btn-block btn-success" href="{{route('admin.register',app()->getlocale())}}">Get New Password</a>
            </div>
            <div>
              <a class="btn btn-info" href="{{route('admin.login',app()->getlocale())}}">Login</a>
             </div>

            </div>
          </form>
        </div>


          </div>
        </div>
      </div>
    </div>
  </div>
   

@endsection