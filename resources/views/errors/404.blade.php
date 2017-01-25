<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
]); ?>
    </script>
    <title>Pagina No Encontrada</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<link href="{{ asset('/bower_components/google-material/material-icons.css') }}" rel="stylesheet">
<link href="{{ asset('/bower_components/materialize/dist/css/materialize.min.css') }}" rel="stylesheet">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato', sans-serif;
    }

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 72px;
    }

    .btn {

        text-align: center;

        font-size: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <p>
                <a href="javascript:history.back()">
                    <IMG SRC="{{ asset('/content/logo.png')}}" WIDTH=200 HEIGHT=200>
                </a>
            </p>
            <p>
                <a href="javascript:history.back()">
                    <IMG href="javascript:history.back()" SRC="{{ asset('/content/404.png')}}" WIDTH=100% HEIGHT=100%>
                </a>
            </p>
            <p>
                <a class="waves-effect  btn  green green-text text-lighten-5" href="javascript:history.back()">
                    <b>
                    @lang('buttons.back')
                    </b>
                </a>
            </p>
            Error: 404 Pagina No Encontrada.
        </div>
    </div>
</body>

</html>
