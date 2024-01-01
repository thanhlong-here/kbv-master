<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="OHERE">
    <title>KBVision</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/vendors/css/extensions/pace.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/colors.css">
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/plugins/pickers/daterange/daterange.css">
  
    <style>
        body {
            font-size: 11px;
            margin: 0;
            padding: 0;
        }

        .container {
            position: fixed;
            top: 30px;
            background-color: transparent;
            width: 100%;
        }
        .progressbar {
            margin: 0;
            padding: 0;
            counter-reset: step;
        }
        .progressbar li {
            list-style-type: none;
            width: 25%;
            float: left;
            font-size: 9px;
            position: relative;
            text-align: center;
            font-weight: 700;
            color: #d2d2d2 ;
        }
        .progressbar li:before {
            width: 30px;
            height: 30px;
            content: counter(step);
            counter-increment: step;
            line-height: 25px;
            border: 2px solid #d2d2d2;
            display: block;
            text-align: center;
            margin: 0 auto 5px auto;
            border-radius: 50%;
            background-color: white;
        }
        .progressbar li:after {
            width: 100%;
            height: 2px;
            content: '';
            position: absolute;
            background-color: #d2d2d2;
            top: 15px;
            left: -50%;
            z-index: -1;
        }
        .progressbar li:first-child:after {
            content: none;
        }
        .progressbar li.active {
            color: white;
        }
        .progressbar li.active:before {
            border-color: white;
            background-color: #0c6194;
        }
        .progressbar li.active + li:after {
            background-color: white;
        }

        .point_wrapper {
            width : 100%;
            height: 100%;
        }
        .point_header {
            height: 15%;
            padding: 20px 0;
            background-color: #56b0de;
        }
        .point_body {
            height: 85%;
            padding:20% 0;

        }

        .point_input_box {
            border: 1px solid #56b0de;
            margin-bottom: 5px;
        }
        .point_title {
            color: white;
            background-color: #56b0de;
            padding: 5px 0;
            margin-bottom: 0;
            font-weight: 600;
            font-size: 12pt;
        }
        .point_input {
            width: 100%;
            font-size: 50px;
            color: black;
            text-align: center;
            font-weight: 600;
            border: none;
        }
        .point_avatar {
            position: relative;
            display: inline-block;
            margin-bottom: 80px;
        }
        .avatar {
            width: 220px;
            height: 220px;
            border-radius: 0;
        }

        .point_next_button{
            color: white;
            padding: 5px 40px;
            background-color: #56b0de;
            border: 1px solid #56b0de;
            border-radius: 25px;
        }
        .text-center {
            text-align: center;
        }
        .main_color {
            color: #56b0de;
        }
        .background_main_color {
            background-color : #56b0de;
        }
        .footer_image {
            position: absolute;
            background: transparent;
            width: 100%;
            height: 25%;
            bottom: 0;
            object-fit: cover;
            padding-left: 40px;
        }
        .btn-next {
            padding: 6px 20px;
            border-radius: 25px;
            background-color: #56b0de;
            color: white;
        }

        <?php
            if( $step  == 3){
          ?>
              .image_box {
                  width: 100%;
                  height: 300px;
                  background-image: url("/images/avatar/page3.png");
                  background-repeat: no-repeat;
                  background-position: center;
                  background-size: cover;
                  padding: 35% 15%;
                  font-size: 11pt;
              }

          <?php
            }
              if( $step  == 4){
          ?>
              .image_box {
                width: 100%;
                height: 300px;
                background-image: url(/images/avatar/page4.png);
                background-repeat: no-repeat;
                background-position: center;
                background-size: contain;
                padding: 28% 15%;
                font-size: 12pt;
              }
          <?php
              }
          ?>

        .shadow{
          border: 1px solid #ccc;
          box-shadow: 3px 3px #dcedf8;
        }
        <?php
          if( $step == 2 || $step == 3){
        ?>


          .point_body {

              background-image: url('{{url("images/avatar/city.png")}}');

              background-position: bottom;
              background-repeat: no-repeat;
              background-size: contain;

          }

        <?php
          }
        ?>

    </style>
</head>

<body>
    <div class="point_wrapper card">
        <div class="point_header">
        </div>

            <div class="container">
                <ul class="progressbar">

                    <li class="active">Chọn xu</li>
                    <li class="{{ $step == 2 || $step == 3 || $step == 4 ? 'active' : ''}} ">Tài khoản</li>
                    <li class="{{ $step == 3 || $step == 4 ? 'active' : ''}}">Share facebook</li>
                    <li class="{{ $step == 4 ? 'active' : ''}}">Hoàn thành</li>
                </ul>
            </div>

        <div class="point_body text-center">
            @if( $step == 1)
                @include('ex.kbv.member.point.step1')
            @elseif( $step == 2)
                @include('ex.kbv.member.point.step2')
            @elseif( $step == 3)
                @include('ex.kbv.member.point.step3')
            @elseif( $step == 4)
                @include('ex.kbv.member.point.step4')
            @endif
        </div>


    </div>


    <!-- <img src="/images/avatar/earth.png" class="footer_image"> -->


    <!-- BEGIN VENDOR JS-->
    <script src="/clients/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/clients/app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
    <script src="/clients/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
    <script src="/clients/app-assets/vendors/js/pickers/daterange/daterangepicker.js" type="text/javascript"></script>
    <script src="/clients/app-assets/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="/clients/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="/clients/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/clients/app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>
    <script src="/clients/app-assets/vendors/js/forms/tags/form-field.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    @yield('footer_scripts')

  </body>
</html>
