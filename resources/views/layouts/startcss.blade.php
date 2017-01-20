@section('startCss')
<!-- Styles -->
{{--
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}} {{-- Style Bootstrap --}}
<link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/bower_components/google-material/material-icons.css') }}" rel="stylesheet">
<link href="{{ asset('/bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') }}" rel="stylesheet">
<link href="{{ asset('/bower_components/bootstrap-material-design/dist/css/ripples.min.css') }}" rel="stylesheet">
 {{-- Materialize --}}
<link href="{{ asset('/bower_components/materialize/dist/css/materialize.min.css') }}" rel="stylesheet">
{{-- FontAwesome --}}
<link href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<style type="text/css">
.form-group {
    margin-top: 0;
    margin-bottom: 0;
}

label.control-label {
    margin-top: 0;
    margin-bottom: 0;
}

.navbar .dropdown-menu li>a {
    padding-top: 0;
    padding-bottom: 0;
    /*   Cambia el Ancho del atributo*/
    width: 200.484px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: pre;
}

a.button-collapse:hover,
.side-nav a {
    text-decoration: none;
}

a.button-collapse {
    color: white;
    text-decoration: none;
/*     position: absolute;
top: 0px;
left: 0px; */
}

.side-nav a:hover,
.navbar .dropdown-menu li:hover,
.navbar .dropdown-menu li>a:hover {
    overflow: visible;
    white-space: normal;
    white-space: nowrap;
    color: #388e3c;
    text-decoration: none;
}

.navbar .dropdown-menu li {
    /* padding-right:  100%;*/
}

.dropdown-menu .divider {
    width: 100%;
    margin-top: 5;
    margin-bottom: 5;
}

#a {
    display: flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;

}
@media only screen and (max-width: 767px) {
    #a {
        position: absolute;
    }
    }
@media only screen and (max-width: 992px) {
    #a {
        /*position: absolute;*/
    }
  nav .brand-logo {
    left: 50%;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
  }
  nav .brand-logo.left, nav .brand-logo.right {
    padding: 0;
    -webkit-transform: none;
            transform: none;
  }
  nav .brand-logo.left {
    left: 0.5rem;
  }
  nav .brand-logo.right {
    right: 0.5rem;
    left: auto;
  }
}
.navbar .navbar-nav>li>a,
.navbar .navbar-brand {
    height: 60px;
}
nav {
    height: 60px;
}
</style>
@endsection
