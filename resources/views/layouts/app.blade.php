<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset("/assets/css/styles.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/assets/css/app.css") }}" rel="stylesheet" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        

        @yield('content')
    </div>

    <!-- Scripts -->
        <script src="{{ asset("/assets/js/jquery-3.5.0.min.js") }}"></script>
        <script src="{{ asset("/assets/js/bootstrap.bundle.min.js") }}"></script>
        
        <script src="{{ asset ("/assets/js/scripts.js") }}" type="text/javascript"></script>
        <script src="{{ asset("/assets/js/app.js") }}"></script>
</body>
</html>
