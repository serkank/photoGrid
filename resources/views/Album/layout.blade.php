<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/custom/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <p class="mesafe40"></p>
    <div class="container">
        <h5>Photo Album @yield('backlink')</h5>
        @yield('content')
        </div>
    <footer class="margin-20 text-center mesafe50">
      
      <small> Serkan KARAOT ® {{ date('Y') }}</small>

    </footer>
  <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>  
  <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('bower_components/custom/custom.js') }}"></script>
  @stack('custom-scripts')
  </body>
</html>