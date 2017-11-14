<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--
    <link rel="shortcut icon" href="assets/images/favicon_1.ico">
    -->

    <title>
        {{ \Config::get('app.name') }}
        @if(isset($title))
            - {{ $title }}
        @endif
    </title>

    {!! Assets::css() !!}
    {!! Assets::js() !!}
</head>

<body>

    @yield('content')


</body>
</html>