<!DOCTYPE html>
<html lang="en">
<head>

    @yield('head')
    @yield('startCss')
    @yield('css')
</head>
<body>
    <div id="app">
		@yield('navBar')

        @yield('content')
        {!!Form::open(['id'=>'logout-form','url'=>'/logout'])!!}
        {!!Form::close()!!}

    </div>

		@yield('startScripts')
        @yield('scripts')

</body>
</html>
