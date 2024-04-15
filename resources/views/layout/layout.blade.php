<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sample_project</title>
        <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> -->
        <!-- <link rel="icon" type="image/png" href="assets/images/" sizes="194x194"> -->
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <script src="{{asset('assets/js/script.js')}}"></script>
        <script src="{{asset('assets/js/libs/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/libs/jquery-ui.js')}}"></script>
        <script src="{{asset('assets/js/libs/jquery-ui.min.js')}}"></script>
    </head>
    <body>
        @yield('content')
        @yield('scripts')
    </body>
</html>
