<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
      {{-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    {{-- Style Bootstrap --}}
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/google-material/material-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-material-design/dist/css/ripples.min.css') }}" rel="stylesheet">
    {{-- Materialize --}}
    <link href="{{ asset('/bower_components/materialize/dist/css/materialize.min.css') }}" rel="stylesheet">

    @yield('css')

<style type="text/css">
    .form-group{
        margin-top: 0;
        margin-bottom: 0;
    }
    label.control-label{
        margin-top: 0;
        margin-bottom: 0;
    }

</style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar  green">

            <div class="container">
                <div class="navbar-header">
 <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    {{-- <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" data-activates="mobile-demo" >
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> --}}

                    <!-- Branding Image -->
<style>
    #a {
    display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;
}
</style>
                    <a id="a" class="navbar-brand brand-logo " href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">@lang('validation.attributes.login')</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                    {!! Menu::make(Session::get('menu'), 'nav navbar-nav') !!}
                        @endif
                    </ul>
                </div>
            </div>
            <div class="nav-wrapper" >
    <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
    </ul>
</div>
        </nav>





        @yield('content')
        {!!Form::open(['id'=>'logout-form','url'=>'/logout'])!!}
        {!!Form::close()!!}

    </div>

    <!-- Scripts -->

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_components/bootstrap-material-design/dist/js/material.min.js"></script>

    <script src="/bower_components/materialize/dist/js/materialize.min.js"></script>
<script type="text/javascript">
$.material.init();
 $( document ).ready(function() {
   $(".button-collapse").sideNav();
        console.log( "document loaded" );
    });

    $( window ).on( "load", function() {
        console.log( "window loaded" );
    });

//funcion Para Cerrar Session por Post Con palabra Reservada Cerrar Sesion
//Utulizando funcion de etiqueta de html contiene
 $("a:contains('{{trans('validation.attributes.logout')}}')").click(function() {
  // alert( "Handler for .click() called." );
  document.getElementById('logout-form').submit();//funcion para ejectuar FORM #Logout-form
});

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
        @yield('scripts')

</body>
</html>
