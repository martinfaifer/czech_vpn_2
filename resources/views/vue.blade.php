<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon">
    <title>{{ config('app.name') }}</title>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="{{ asset('js/custom. js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        * {
            text-transform: none !important;
        }

        [v-cloak] {
            display: inline !important;
        }
    </style>

    @paddleJS
</head>

<body>
    {{-- <canvas id="canvas"> </canvas> --}}
    <v-app id="app">
    </v-app>
</body>




</html>
