<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>KBVision</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/vendors/css/extensions/pace.css">
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/colors.css">
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="/clients/app-assets/css/core/colors/palette-gradient.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />

    <style>
        .card {
            padding: 20px;
            margin-bottom: 0;
            height: 100%;
            background-image: linear-gradient(#62bacd, #0564b4);
            overflow: auto;
        }

        input[type=text] {
            border: none;
            border-bottom: 1px solid #ddd;
            background-color: transparent;
        }

        input[type=text]:focus {
            border: none;
            border-bottom: 1px solid #ddd;
            background-color: transparent;
        }

        .icon_input {
            font-size: 22px;
            padding-top: 5px;
            color: #b9d2e5;
        }

        .text-center {
            text-align: center;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-5 {
            margin-bottom: 5px !important;
        }

        .member_score {
            padding: 40px;
            margin-bottom: 0px;
        }

        .member_score_box {
            padding-top: 5px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3), 0 0 0px rgba(0, 0, 0, 0.1) inset;
        }

        .avatar_info {
            position: relative;
            display: inline-block;

        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .avatar_detail {
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            width: 30px;
            height: 30px;
        }

        .fixed_edit_box {
            position: absolute;
            bottom: 0rem;
            right: 0rem;
        }

        .edit_avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        .footer_image {
            position: absolute;
            background: transparent;
            width: 100%;
            height: 25%;
            left: 0;
            bottom: 0;
            opacity: 0.2;
        }

        .main_text_color {
            color: #fff !important;
            font-size: 12pt;
            font-weight: 600;
        }

        .btn-next {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #3f99c7;
            color: white;
            border: 1px #fff solid;
        }

        .text-right {
            text-align: right !important;
        }

        .select2-container--default .select2-selection--single {
            border: none;
            border-bottom: 1px solid #ddd;
            background-color: transparent;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #fff !important;
            font-weight: 600;
        }

        .form-info .form-control {
            border-radius: 0;
            background: url("{{url('images/ico_input.png')}}");
            background-position: right;
            background-repeat: no-repeat;
        }

        .form-info .select2-selection__arrow {
            background: url("{{url('images/ico_input.png')}}");
            background-position: right;
            background-repeat: no-repeat;
            right: 0px !important
        }

        .form-info .select2-container--default .select2-selection--single {
            border-radius: 0;
        }

        .form-info .select2-selection__arrow b {
            display: none;
        }
    </style>

</head>

<body>

    <div class="card ">
        <div>
            <span onclick="window.ReactNativeWebView.postMessage('menu')">
                <img src="/images/avatar/comment_info.png" class="avatar_detail">
            </span>
            <div class="text-center">
                <div class="avatar_info">
                    <img src="/images/avatar/anonymour_avatar.png" class="avatar">
                    <div class="fixed_edit_box">
                        <img src="/images/avatar/edit_pencil.png" class="edit_avatar">
                    </div>
                </div>
            </div>
        </div>

        <div class="row member_score text-center">
            <div class="col-xs-6 member_score_box">
                <p class="mb-0" style="color: gray">Điểm tích lũy </p>
                <p style="color: #00a7e8; font-size: 35px;" class="mb-0">
                    <a href="{{url('screen/history')}}">
                        <strong id="memberPoint">
                            {{ $mem->redeempoint }}
                        </strong>
                    </a>

                </p>
            </div>
            <div class="col-xs-6 member_score_box">

                <a href="{{$mem->xu ? url('screen/history-xu') :'#'}}" id="xuredeem">
                    <p class="mb-0" style="color: gray">KB Ví (xu)</p>
                    <p style="color: #00a7e8; font-size: 35px;" class="mb-0">
                        <strong id='memberXu'> {{$mem->xu}} </strong>
                    </p>
                </a>
            </div>
        </div>

        <form class="form form-info" action="{{url('screen/update')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="mem_id" value="{{ $mem->id ? $mem->id : '' }}">
            <div class="row">
                <div class="col-xs-1 icon_input">
                    <i class="fa fa-user"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        <input type="text" class="form-control main_text_color" name="name" value="{{ $mem->name ? $mem->name : '' }}">

                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-1 icon_input">
                    <i class="fa fa-building"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        <input type="text" class="form-control main_text_color" name="work" value="{{ $mem->work ? $mem->work : '' }}">

                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 icon_input">
                    <i class="fa fa-briefcase"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        <input type="text" class="form-control main_text_color" name="job" value="{{ $mem->job ? $mem->job : '' }}">

                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 icon_input" style="font-size:26px">
                    <i class="fa fa-home"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        <input type="text" class="form-control main_text_color" name="address" value="{{ $mem->address ? $mem->address : '' }}">

                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 icon_input">
                    <i class="fa fa-birthday-cake"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        <input type="text" class="form-control main_text_color" name="birthday" value="{{ $mem->birthday ? date('Y-m-d', strtotime($mem->birthday)) : '' }}">

                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 icon_input">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        <input type="text" class="form-control main_text_color" name="email" value="{{ $mem->email ? $mem->email : '' }}">

                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-1 icon_input" style="font-size: 26px;
    padding-left: 4%;">
                    <i class="fa fa-map-marker"></i>
                </div>
                <div class="col-xs-11">
                    <fieldset class="form-group mb-0 position-relative">
                        {{-- <input type="text" class="form-control main_text_color" value="{{ $mem->city_area ? $mem->city_area : '' }}"> --}}
                        <select class="js-example-basic-single form-control main_text_color" name="cities">
                            @foreach ($cities as $index => $city)
                            <option <?= (old('cities') && old('cities') == $city->id) || (!old('cities') && $mem && $mem->area == $city->id) ? 'selected' : '' ?> value="{{ $city->id }}">
                                {{ $city->name }}
                            </option>
                            @endforeach
                        </select>

                    </fieldset>
                </div>
            </div>
            <div class="row text-right" style="margin-top: 20px;padding-bottom:200px">
                <button type="submit" class="btn btn-next btn-min-width mr-1 mb-1">Cập nhật <i class="fa fa-paper-plane "></i></a>

            </div>

        </form>

    </div>

    <img src="/images/avatar/earth.png" class="footer_image">

    <!-- BEGIN VENDOR JS-->
    <script src="/clients/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="/clients/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="/clients/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/clients/app-assets/vendors/js/forms/tags/form-field.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            setInterval(function() {
                $.ajax({
                        method: "GET",
                        url: "/api/screen/info",
                    })
                    .done(function(msg) {
                        if (msg.success == 'true') {
                            $("#memberPoint").html(msg.redeempoint);
                            $("#memberXu").html(msg.xu);
                        }
                    });
            }, 5000);


        });
    </script>
    <script>
        function awaitPostMessage() {
            let isReactNativePostMessageReady = !!window.originalPostMessage;
            const queue = [];
            let currentPostMessageFn = function store(message) {
                if (queue.length > 100) queue.shift();
                queue.push(message);
            };
            if (!isReactNativePostMessageReady) {
                // const originalPostMessage = window.postMessage;
                Object.defineProperty(window, 'postMessage', {
                    configurable: true,
                    enumerable: true,
                    get() {
                        return currentPostMessageFn;
                    },
                    set(fn) {
                        currentPostMessageFn = fn;
                        isReactNativePostMessageReady = true;
                        setTimeout(sendQueue, 0);
                    }
                });
            }

            function sendQueue() {
                while (queue.length > 0) window.postMessage(queue.shift());
            }
        }
        awaitPostMessage();
    </script>
</body>

</html>