<html lang="{{ app()->getLocale() }}">
  @include('inc.head')
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu">
  @include('inc.brand')
  <!-- navbar-fixed-top-->


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark">

    <div class="main-menu-content menu-accordion">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

        <li class="navigation-header"><span>System</span>
          <i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="System">
          </i>

        </li>

        <li class="nav-item">
            <a href="{{url('domain')}}"><i class="ft-cpu"></i><span data-i18n="" class="menu-title">Domain</span></a>
        </li>
        <li class="nav-item">
            <a href="{{url('country')}}"><i class="ft-globe"></i><span data-i18n="" class="menu-title">Country</span></a>
        </li>
        <li class="nav-item">
            <a href="{{url('group')}}"><i class="ft-globe"></i><span data-i18n="" class="menu-title">Group</span></a>
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
    </body>
</html>
