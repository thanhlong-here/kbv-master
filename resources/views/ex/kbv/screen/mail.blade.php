@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">
    <div class="card">
      <div class="card-block">
        <p>Từ : {{$email}}</p>
        <h4 class='card-title'>
                    {{$title}}
                    </h4>
                    <p>{{$content}}</p>

      </div>
    </div>

  </div>
</div>

@endsection
