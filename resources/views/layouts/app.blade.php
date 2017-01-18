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
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- Style Bootstrap --}}
    <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/bower_components/bootstrap-material-design/dist/css/ripples.min.css') }}" rel="stylesheet">
    {{-- Materialize --}}
    {{-- <link href="{{ asset('/bower_components/materialize/dist/css/materialize.min.css') }}" rel="stylesheet"> --}}

    @yield('css')


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
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
        </nav>

        @yield('content')
        {!!Form::open(['id'=>'logout-form','url'=>'/logout'])!!}
        {!!Form::close()!!}

    </div>

    <!-- Scripts -->

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_components/bootstrap-material-design/dist/js/material.min.js"></script>
    {{-- <script src="/bower_components/materialize/dist/js/materialize.min.js"></script> --}}
<script type="text/javascript">
$.material.init();
$('document').ready({

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
