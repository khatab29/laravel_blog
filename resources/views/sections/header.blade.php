<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <div class="row col-8">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show">
            <svg class="c-icon c-icon-lg">
                <use
                    xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}">
                </use>
            </svg>
        </button><a class="c-header-brand d-lg-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
            </svg></a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
            data-class="c-sidebar-lg-show" responsive="true">
            <svg class="c-icon c-icon-lg">
                <use
                    xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}">
                </use>
            </svg>
        </button>
        <ul class="c-header-nav d-md-down-none">
            <div class="dropdown show ">
                <a class="btn btn-info btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('header.Languages') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </div>
            </div>
            <li class="c-header-nav-item px-3"><a class="c-header-nav-link"
                    href="#">{{ __('header.Dashboard') }}</a></li>
            <li class="c-header-nav-item px-3"><a class="c-header-nav-link"
                    href="#">{{ __('header.Users') }}</a></li>
            <li class="c-header-nav-item px-3"><a class="c-header-nav-link"
                    href="#">{{ __('header.Settings') }}</a></li>
        </ul>
    </div>
    <div class="row col-4">
        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use
                            xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bell') }}">
                        </use>
                    </svg></a></li>
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use
                            xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}">
                        </use>
                    </svg></a></li>
            <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
                    <svg class="c-icon">
                        <use
                            xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}">
                        </use>
                    </svg></a></li>
            <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar"><img class="c-avatar-img"
                            src="{{ asset('assets/img/avatars/6.jpg') }}" alt="user@email.com">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Account</strong></div><a class="dropdown-item"
                        href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bell') }}">
                            </use>
                        </svg> Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item"
                        href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}">
                            </use>
                        </svg> Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item"
                        href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-task') }}">
                            </use>
                        </svg> Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item"
                        href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-comment-square') }}">
                            </use>
                        </svg> Comments<span class="badge badge-warning ml-auto">42</span></a>
                    <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item"
                        href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                            </use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-settings') }}">
                            </use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-credit-card') }}">
                            </use>
                        </svg> Payments<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item"
                        href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-file') }}">
                            </use>
                        </svg> Projects<span class="badge badge-primary ml-auto">42</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}">
                            </use>
                        </svg> Lock Account</a><a class="dropdown-item" href="#">
                        <svg class="c-icon mr-2">
                            <use
                                xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                            </use>
                        </svg> Logout</a>
                </div>
            </li>
        </ul>

    </div>

    <div class="c-subheader px-3">
        <!-- Breadcrumb-->

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="">{{ __('header.Home') }}</a></li>
            <li class="breadcrumb-item"><a href="#">{{ __('header.Admin') }}</a></li>
            <li class="breadcrumb-item active">{{ __('header.Dashboard') }}</li>
            <!-- Breadcrumb Menu-->
        </ol>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </nav>
        </div>
    </div>
</header>
