@section('navBar')
<nav class="navbar  green">
<div class="container">
    <div class="navbar-header nav-wrapper">
        <!-- Branding Image -->
        @if(Auth::check())
        <a href="#" data-activates="mobile-demo" class=" button-collapse waves-effect waves-light"><i class="material-icons">menu</i></a> @endif
        <a id="a" class="navbar-brand brand-logo  white-text" href="{{ url('/') }}">
            <IMG id="logo" SRC="{{ asset('/content/logo.png')}}" WIDTH=60 HEIGHT=60>
        </a>
        <ul id="nav-mobile" class=" nav navbar-nav left hide-on-med-and-down">
            <li>
                <a href="{{ url('/') }}" class="waves-effect waves-light"> {{ config('app.name', 'Laravel') }}</a>
            </li>
        </ul>
        {{--
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" data-activates="mobile-demo">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> --}}
    </div>
    <div class=" navbar-collapse right hide-on-med-and-down" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav hide-on-med-and-down right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">@lang('validation.attributes.login')</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            @else @yield('menu') {{-- {!! Menu::make(Session::get('menu'), 'nav navbar-nav') !!} --}} @endif
        </ul>
    </div>
    </div>
    <div class="nav-wrapper">
        <ul class="side-nav" id="mobile-demo">
            @yield('menu')
        </ul>
    </div>
</nav>
@endsection
