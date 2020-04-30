@extends('layouts.admin')
@section('content')
    <div class="container">

      <ul class="navbar-nav">
      <li class="nav-item">
        <a  href="{{route(Route::currentRouteName(),'en')}}">English</a>|
        <a  href="{{route(Route::currentRouteName(),'ar')}}">العربية</a>
      </li>
    </ul>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="clearfix">
            <h1 class="float-left display-3 mr-4">500</h1>
            <h4 class="pt-3">{{__('500.Houston, we have a problem!')}}</h4>
            <p class="text-muted">{{__('500.The page you are looking for is temporarily unavailable.')}}</p>
          </div>
          <div class="input-prepend input-group">
            <div class="input-group-prepend"><span class="input-group-text">
                <svg class="c-icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                </svg></span></div>
            <input class="form-control" id="prependedInput" size="16" type="text" placeholder="{{__('What are you looking for?')}}"><span class="input-group-append">
              <button class="btn btn-info" type="button">{{__('Search')}}</button></span>
          </div>
        </div>
      </div>
    </div>
  </div>
    @endsection