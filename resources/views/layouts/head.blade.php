<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Internetinė apskaitos sistema DINETA.web">
    <meta name="author" content="UAB Dineta">
    <meta name="robots" content="noindex">
    <meta name="keywords" content="apskaitos programa, buhalterines apskaitos programa, buhalterine programa, internetine buhalterine programa, buhalterines apskaitos programos, internetine apskaitos programa">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('theme/css/light.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
