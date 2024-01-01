
<html lang="{{ app()->getLocale() }}">

  @include('inc.head')
<body  data-menu="vertical-menu" data-col="2-columns"
class="vertical-layout vertical-menu">

      @include('inc.brand')


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark">

    <div class="main-menu-content menu-accordion">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li>
            <a href="{{url('/dashboard/')}}"><i class="ft-grid"> </i><span data-i18n="" class="menu-title"> Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a href="#"><i class="ft-bar-chart"> </i><span data-i18n="" class="menu-title"> Report</span></a>
        </li>
        <li ><a href="{{url('/message')}}" class="menu-item">

          <i class="ft-bell"> </i>
        <span>  Message</span></a>
        </li>
        <li class="nav-item has-sub"><a href="#"><i class="ft-briefcase"></i><span data-i18n="" class="menu-title">About us</span></a>
            <ul class="menu-content">

              <li ><a href="#" class="menu-item">Info</a>
              </li>

              <li ><a href="#" class="menu-item">Locations</a>
              </li>

              <li><a href="#" class="menu-item">Admin</a>

              </li>


            </ul>
          </li>

        <li class="navigation-header"><span>Promotion Channel</span>
          <i class=" ft-minus" >
          </i>
        </li>
        <li class="nav-item has-sub">
            <a href="#"><i class="ft-globe"> </i><span data-i18n="" class="menu-title"> FreeVoucher </span></a>
            <ul class="menu-content" >
              <li>
                  <a href="{{url('reward')}}/">

                    <span data-i18n="" class="menu-title">Reward</span></a>
              </li>

              <li>
                  <a href="{{url('upgrade')}}">
                    <span data-i18n="" class="menu-title">Upgrade</span></a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-sub">
            <a href="#"><i class="ft-aperture"></i><span data-i18n="" class="menu-title">Only Member</span></a>

            <ul class="menu-content" >
              <li>
                  <a href="{{url('/reward/')}}/">
                    <span data-i18n="" class="menu-title">Reward</span></a>
              </li>

              <li>
                  <a href="{{url('/redeem/')}}">
                    <span data-i18n="" class="menu-title">Redeem</span></a>
              </li>

            </ul>
        </li>

        <li class="navigation-header">
          <span>Member</span>
          <i class="ft-minus" ></i>
        </li>
        <li>
            <a href="{{url('/member/')}}">
              <i class="ft-user-plus"> </i><span data-i18n="" class="menu-title">Member</span></a>
        </li>
        <li>
            <a href="{{url('/card/')}}">
              <i class="ft-user-plus"> </i><span data-i18n="" class="menu-title">Card</span></a>
        </li>
        <li class="navigation-header">
          <span>Interact</span>
          <i class="ft-minus" ></i>
        </li>

        <li>
            <a href="{{url('/visitor/')}}"><i class="ft-heart"> </i><span data-i18n="" class="menu-title">Prospect</span></a>
        </li>
        <li ><a href="#" class="menu-item"><i class="ft-activity"> </i><span data-i18n="" class="menu-title">Interact</span></a>
        </li>

      </ul>
    </div>

  </div>

  <div class="app-content content container-fluid">
    @yield('content')
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <div class="profile text-xs-right">
    <ul class="nav">

              <li class="nav-item">
                <p >
                  <a href="{{url('logout')}}"><span >Logout</span>  <i class="ft-power"></i> </a>
                </p>
              </li>
              <li class="nav-item">
                <p >
                  <a href="{{url('password')}}">
                    <span >Change password</span> <i class="fa fa-key"></i>
                  </a>
                </p>
              </li>
    </ul>
  </div>
  @include('inc.footer')

  <script src="{{ mix('js/app.js') }}">


  </script>
  </body>
</html>
