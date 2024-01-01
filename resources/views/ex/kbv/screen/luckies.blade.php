@extends('ex.kbv.screen')
@section('content')

<div class="content-wrapper bg_redeem_top" style="background-image: url('{{url("images/bg_top.jpg")}}');height:100%">

  <div class="content-header row text-xs-center" >




                            <div class="tabs" >
                              <span class="first  tab">
                                <a href="{{url('screen/game')}}">
                                Khuyến mại
                                </a>
                            </span>
                            <span class="end ati">

                                      Mã đã nhận

                                      </span>


                              </div>
  </div>

  <div class="content-body content-wrapper"
  style="margin-top:5%;height:100%;">




                @foreach( $luckies as $lucky)

                  <div class="row" >
                    <div class="card shadow">
                      <div class="card-block">

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
                @endforeach
    </div>
</div>

<div class="row">
    <div class="card-footer">
        {{ $query->render() }}

  </div>
</div>

@endsection
