<html lang="{{ app()->getLocale() }}">

  @include('inc.head')
<body  data-menu="vertical-menu" data-col="2-columns"
class="vertical-layout vertical-menu">



  <div class="app-content content container-fluid">
    @yield('content')
  </div>
  
  @include('inc.footer')

  <script src="{{ mix('js/app.js') }}">


  </script>
  </body>
</html>
