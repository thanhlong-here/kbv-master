@extends('.screen')
@section('content')
<div class="content-wrapper">
  <div class="content-header row text-xs-center">



          <div class="btn-group" >

  <span class="btn btn-outline-blue-grey">
                  <a href="{{url('screen/redeem')}}">
                      Phần thưởng
                    </a>
                    </span>
                    <button type="button" class="btn btn-success">
                      Mã đã nhận</button>

            </div>

  </div>

  <div class="content-body content-wrapper">

      <div class="card">
        <div class="card-block">


                @foreach( $release as $r)
                  <?php if($r) { ?>
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
                  <?php } ?>
                @endforeach


          {{$query->render()}}
          </div>
        </div>
  </div>
</div>

@endsection
