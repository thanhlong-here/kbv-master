  <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li>
    <a href="{{url('dashboard/')}}"><i class="ft-grid"> </i><span data-i18n="" class="menu-title"> Dashboard</span></a>
</li>
<li class="nav-item  has-sub open">
  <a href="#">
    <i class="ft-bar-chart"></i><span data-i18n="" class="menu-title">
      Báo cáo</span></a>
      <ul class="menu-content">


        <li >
          <a href="{{url('lott')}}">
            <span data-i18n="" class="menu-title">Trả thưởng </span>
          </a>
        </li>
      </ul>

</li>

<li class="nav-item has-sub open ">
  <a href="#">
    <i class="ft-award"></i><span data-i18n="" class="menu-title">
      Nhiệm vụ</span></a>
    <ul class="menu-content">

      <li ><a href="{{url('mission')}}" class="menu-item">

        <span>  Quét mã nhận điểm</span></a>
      </li>

      <li ><a href="{{url('lucky')}}" class="menu-item">Xổ số trả thưởng</a>
      </li>



    </ul>
  </li>


<li>
    <a href="{{url('redeem')}}">
        <i class="ft-box"> </i>
      <span data-i18n="" class="menu-title">Quà đổi điểm</span></a>
</li>

  <li>
      <a href="{{url('news')}}">
          <i class="ft-bell"> </i>
        <span data-i18n="" class="menu-title" > Tin tức </span></a>
  </li>




<li>
    <a href="{{url('member')}}">
      <i class="ft-user-plus"> </i><span data-i18n="" class="menu-title">Thành viên</span></a>
</li>
<li>
    <a href="{{url('logout')}}">
      <i class="ft-power"> </i><span data-i18n="" class="menu-title">Đăng xuất</span></a>
</li>
</ul>
