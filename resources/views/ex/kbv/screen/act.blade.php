@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper bg_redeem_top" style="background-image: url('{{url("images/bg_top.jpg")}}');">

  <div class="content-header row text-xs-center">

            <div class="tabs" >
              <span class="first tab">
                  <a href="{{url('screen/redeem')}}">
                    Phần thưởng
                  </a>
            </span>
          <span class="end  ati">
                      Mã đã nhận
                      </span>


              </div>
  </div>

  <div class="content-body content-wrapper"
    style="margin-top:5%;height:90%;background-image: url('../images/bg_bottom.jpg');
    background-position: bottom;
    background-repeat: no-repeat;
    background-size: contain;
    ">

      <div class="card">



                @foreach( $release as $r)
                  <?php if($r) { ?>
                      <div class="card-block shadow">
                        <div class="row" >
                          <div class="col-md-12">
                            <div class="font-medium-2">
                                Seri :   {{ $r->seri_no }}

                            </div>
                            <p class="blue-grey">
                                Lúc : {{ $r->created_at }}</br>

                                Điểm thưởng:{{ $r->points }}
                            </p>
                          </div>
                        </div>
                  </div>
                  <?php } ?>
                @endforeach





        </div>
        <div class="pag">
            {{$query->render()}}
        </div>
  </div>

</div>

@endsection
