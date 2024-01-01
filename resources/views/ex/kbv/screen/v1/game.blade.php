@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  @if($lock == 'false')
  <div class="content-header row text-xs-center">

      <div class="btn-group" >

          <button type="button" class="btn btn-success">
            Khuyến mãi</button>
  <span class="btn btn-outline-blue-grey">
              <a href="{{url('screen/luckies')}}">
                Số đã nhận
                </a>
                </span>
        </div>

  </div>

  <div class="content-body content-wrapper">

    @foreach( $lotteries as $lottery)
  <div class="row">
    <div class="card">
      <div class="card-block">
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
