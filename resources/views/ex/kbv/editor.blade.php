<html lang="{{ app()->getLocale() }}">

  @include('ex.kbv.inc.head')

<body  data-menu="vertical-menu" data-col="2-columns"
class="vertical-layout vertical-menu">

      @include('ex.kbv.brand')


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark">

    <div class="main-menu-content menu-accordion">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

          <li>
              <a href="{{url('news')}}">
                  <i class="ft-bell"> </i>
                <span data-i18n="" class="menu-title" > Tin tức </span></a>
          </li>

          <li>
              <a href="{{url('logout')}}">
                <i class="ft-power"> </i><span data-i18n="" class="menu-title">Đăng xuất</span></a>
          </li>







      </ul>
    </div>

  </div>

  <div class="app-content content container-fluid">



    @yield('content')
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  @include('inc.footer')

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

  <script src="{{url('js/toastr.min.js')}}"></script>
  <script>

$(document).ready(function() {
    $('.summernote').summernote();
});


@if(Session::has('message'))

  <?php
    $mess = Session::get('message') ;

    switch (Session::get('flag')) {
      case 'success':
          echo "toastr.success('".$mess."')"  ;
        break;
      case 'failed':
            echo "toastr.error('".$mess."')"   ;
        break;
      default:
          echo "toastr.info('".$mess."')";
        break;
    }

  ?>


  @endif

</script>
  </body>
</html>
