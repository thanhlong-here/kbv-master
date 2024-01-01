@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">
    <div class="card">
      <div class="card-block">
        <h4 class='card-title'>
                    Chúc mừng bạn vừa nhận thưởng +{{$message['point']}}
                    vào lúc : {{$message['time']}}
                    </h4>
                    <p>Tổng điểm hiện có : {{$message['total']}}</p>

      </div>
    </div>

  </div>
</div>

@endsection
