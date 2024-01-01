<html lang="{{ app()->getLocale() }}">

  @include('inc.head')
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu">

      @include('inc.brand')
  <!-- navbar-fixed-top-->


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark">

    <div class="main-menu-content menu-accordion">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

        <li class="navigation-header"><span>Management</span>
          <i class=" ft-minus" >
          </i>
        </li>
        <li>
            <a href="freevoucher/"><i class="ft-watch"> </i><span data-i18n="" class="menu-title">FreeVoucher</span></a>
        </li>
        <li class="nav-item">
            <a href="{{url('issuer')}}"><i class="ft-briefcase"></i><span data-i18n="" class="menu-title">Issuer</span></a>
        </li>

        <li>
            <a href="{{url('web')}}"><i class="ft-globe"> </i><span data-i18n="" class="menu-title">Web</span></a>
        </li>
        <li class="navigation-header">
          <span>Administration</span>
          <i class=" ft-minus" ></i>
        </li>
        <li>
            <a href="{{url('role')}}"><i class="ft-unlock"> </i><span data-i18n="" class="menu-title">Role</span></a>
        </li>
        <li>
            <a href="{{url('admin')}}"><i class="ft-eye"> </i><span data-i18n="" class="menu-title">Admin</span></a>
        </li>


        <li class="navigation-header">
          <span>In App</span>
          <i class=" ft-minus" ></i>
        </li>
        <li>
            <a href="{{url('user')}}"><i class="ft-globe"> </i><span data-i18n="" class="menu-title">User</span></a>
        </li>
        <li>
            <a href="{{url('report')}}"><i class="ft-bar-chart-2"> </i><span data-i18n="" class="menu-title">Report</span></a>
        </li>
        <li class="nav-item has-sub">
          <a href="#"><i class="ft-zap" ></i>
          <span data-i18n="" class="menu-title">Setting</span></a>
          <ul class="menu-content">
            <li>
                <a href="{{url('area')}}"><span data-i18n="" class="menu-title">Area</span></a>
            </li>
            <li>
                <a href="{{url('group')}}"><span data-i18n="" class="menu-title">Group</span></a>
            </li>

            <li>
                <a href="{{url('policy')}}"><span data-i18n="" class="menu-title">Policy</span></a>
            </li>
          </ul>
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
