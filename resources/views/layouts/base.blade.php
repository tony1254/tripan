<!DOCTYPE html>
<html lang="en">
<head>

    @yield('head')
    @yield('startCss')
    @yield('css')

</head>
<body>
        {!!Form::open(['id'=>'logout-form','url'=>'/logout'])!!}
        {!!Form::close()!!}
    <div id="app">
        @yield('navBar')

{!! Alert::render() !!}
        @yield('content')

    </div>

		@yield('startScripts')
        @yield('scripts')
        @yield('endScripts')

</body>
</html>
