<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Panse-Bêtes') }}</title>
        <link rel="icon" href="{{url('favicon.ico ')}}" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ url('css/app.css') }}" />
        <link rel="stylesheet" href="{{url('css/bootstrap-table.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body>
      @yield('menuprincipal')
      @yield('menu')
      @yield('sousmenu')
      @yield('soustitre')
      @yield('contenu')
      {{-- @yield('aide') --}}


      <script src="{{ url('js/jquery.min.js') }}"></script>
      <script src="{{ url('js/jquery-ui.min.js') }}"></script>
      <script src="{{ url('js/jquery-confirm.min.js') }}"></script>
      <script src="{{ url('js/bootstrap.min.js') }}"></script>
      <script src="{{ url('js/bootstrap/bootstrap.min.js') }}"></script>
      <script src="{{ url('js/bootstrap-table.min.js') }}"></script>
      <script src="{{ url('js/bootstrap-table-fr-FR.min.js') }}"></script>
      <script src="{{ url('js/app.js') }}"></script>

      @yield('scripts')
      @stack('js')

    </body>
</html>
