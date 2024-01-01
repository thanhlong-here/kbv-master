<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KBVision</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="{{ mix('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ mix('css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ mix('css/colors.css') }}" rel="stylesheet">
    <link href="{{ mix('css/custom-rtl.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

</head>

<body  >



  <div class="app-content content container-fluid">
    @yield('content')
  </div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

  <script src="{{ mix('js/app.js') }}">


  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@if(Session::has('message'))
  <script>
  <?php
    $mess = Session::get('message') ;

    switch (Session::get('flag')) {
      case 'success':
          echo "toastr.success('".$mess."')"   ;
        break;
      case 'failed':
            echo "toastr.error('".$mess."')"   ;
        break;
      default:
          echo "toastr.info('".$mess."')";
        break;
    }
  ?>


    </script>
  @endif



  </body>
</html>
