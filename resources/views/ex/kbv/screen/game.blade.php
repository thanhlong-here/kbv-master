@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper bg_redeem_top" style="background-image: url('{{url("images/bg_top.jpg")}}');height:100%">

  @if($lock == 'false')
  <div class="content-header row text-xs-center">



                <div class="tabs" >
                  <span class="first  ati">

                      Khuyến mại

                </span>
              <span class="end tab">
                <a href="{{url('screen/luckies')}}">
                          Mã đã nhận
                        </a>
                          </span>


                  </div>
  </div>

  <div class="content-body content-wrapper"
  style="margin-top:5%;height:90%;background-image: url('../images/bg_bottom.jpg');
  background-position: bottom;
  background-repeat: no-repeat;
  background-size: contain;
  "
  >

    @foreach( $lotteries as $lottery)
  <div class="row">
    <div class="card shadow">
      <div class="card-block ">
        <a href="{{url('screen/game/lottery/'.$lottery->id)}}">
          <img class="card-img img-fluid mb-1"
            src="{{$lottery->img}}" >
        </a>
          <a href="{{url('screen/game/lottery/'.$lottery->id)}}">
        <h4 class="card-title">{{$lottery->title}}</h4>
      </a>

          </div>
        </div>
  </div>
    @endforeach
  {{ $query->render() }}

  </div>
  @else
      <div class="row">
<img class="card-img-top img-fluid" src="{{url('kbv/bg_mb.jpg')}}" >
      </div>
  @endif
</div>

@endsection
