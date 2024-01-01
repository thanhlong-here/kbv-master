@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">
  <div class="content-header row text-xs-center">



          <div class="btn-group" >

  <span class="btn btn-outline-blue-grey">
                  <a href="{{url('screen/game')}}">
                      Khuyến mãi
                    </a>
                    </span>
                    <button type="button" class="btn btn-success">
                      Số đã nhận</button>

            </div>

  </div>

  <div class="content-body content-wrapper">




                @foreach( $luckies as $lucky)

                  <div class="row" >
                    <div class="card">
                      <div class="card-block">
                    <div class="col-md-12">
                      <div class="font-medium-2 {{$lucky->status =='close' ? 'text-warning' : 'text-success' }}">
                          Số may mắn : <strong>  {{ $lucky->show }} </strong>

                      </div>
                      <div class="blue-grey" >
                        <p> Nhận lúc :
                              {{ date('d-m-Y', strtotime($lucky->created_at)) }} </br>

                          Ngày mở  thưởng :   {{ date('d-m-Y', strtotime($lucky->end_at)) }}
                        </p>
                        <p> {{$lucky->status =='close' ? 'Đã đóng' : 'Đang mở thưởng' }} </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                @endforeach
<div class="row">
    <div class="card-footer">
        {{ $query->render() }}
      <div>
  </div>
  </div>
</div>

@endsection
