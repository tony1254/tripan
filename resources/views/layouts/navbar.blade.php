@section('navBar')
<nav class="navbar  green">

            <div class="container">
                <div class="navbar-header nav-wrapper">
                    <!-- Branding Image -->
                    <a id="a" class="navbar-brand brand-logo waves-effect waves-light white-text" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
@if(Auth::check())

 <a href="#" data-activates="mobile-demo" class=" button-collapse waves-effect waves-light"><i class="material-icons">menu</i></a>
 @endif
                    {{-- <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" data-activates="mobile-demo" >
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
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">@lang('validation.attributes.login')</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                          @yield('menu')
                    {{-- {!! Menu::make(Session::get('menu'), 'nav navbar-nav') !!} --}}
                        @endif
                    </ul>
                </div>
            </div>
<div class="nav-wrapper" >
    <ul class="side-nav" id="mobile-demo">
        @yield('menu')
    </ul>
</div>
        </nav>
@endsection