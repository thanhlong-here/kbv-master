<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Life +</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ mix('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ mix('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ mix('css/colors.css') }}" rel="stylesheet">
    <link href="{{ mix('css/custom-rtl.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu">

  <!-- navbar-fixed-top-->


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- / main menu-->

  <div class="app-content content container-fluid">
    @yield('content')
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  @include('inc.footer')
  <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
