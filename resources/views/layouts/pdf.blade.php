<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Panses-Bêtes') }}</title>
    <link rel="icon" href="{{url('favicon.ico ')}}" />
     <!-- Styles -->
     <link rel="stylesheet" href="{{ url('css/app.css') }}" />
     <link rel="stylesheet" href="{{ url('css/pdf.css') }}" />
</head>
<body>

        @yield('entete')
        @yield('contenu')
        @yield('pied_de_page')


</body>
</html>
