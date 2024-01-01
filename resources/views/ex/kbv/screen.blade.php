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
    @yield('header')


    <style>
        .home-header{
            padding: 1rem 0;
            background-color: #0a84cc;
            margin-top: -1rem;
            margin-bottom: 2rem;
        }

        .tabs{
            margin-top: 5%;
        }
        .tab{
            background: #fff;
            color: #000;
        }

        .ati{
            background: #0f86cd;
            color: #fff;
        }
        .first{
          border-radius: 8px 0 0 8px;
          padding: 8px;
          border: 1px solid #0f86cd;
        }
        .end{
          border-radius: 0 8px 8px 0;

          padding: 8px;

          border: 1px solid #0f86cd;
          margin-left: -5px;

        }
        .end a
        {
            color:#000;
        }
        .pag{
          position:absolute;width:100%;padding:5%
        }
        .app-content{
          overflow: hidden;
        
        }
        .bot{
          border-top: 1px dotted #0069b3;
          width: 60%;
        }
    </style>
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

  <script>

      $("#xuredeem").on('click', function() {
          if ( +($(this).data('value')) >= 200 ) {
              window.location = $(this).data('link');
          } else {
              alert("Bạn không đủ xu để đổi");
          }
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
    @yield('footer')
  </body>
</html>
