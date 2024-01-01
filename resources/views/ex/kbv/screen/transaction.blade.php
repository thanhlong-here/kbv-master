@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">
  <form class="form">
      <div class="form-body">

  <h4 class="form-section">
  <a href="{{url('screen/info')}}">
    <i class="ft-arrow-left"></i>
  </a>
    Lịch sử</h4>
</form>
  <div class="content-body">
      <div class="card-block">


            @foreach( $rows as $row )
            <div class="card">
              <div class="row" >

                <div class="{{ $row->s }} " style="padding:0.75rem">

                    {{ $row->note }}


                </div>

                <div class="{{$row->c}} " style="padding:0.75rem">

                     <strong>
                          {{ $row->out ? '-'.$row->out : '+'.$row->in }} điểm :
                        </strong>
                        {{ $row->created_at }}

                </div>
              </div>
              </div>

            @endforeach

          <div class="row">
              {{$query->render()}}
          </div>

  </div>
</div>
</div>

@endsection
