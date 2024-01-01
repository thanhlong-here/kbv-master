@extends('.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">Thành Viên :

      </h4>
    </div>

  </div>
  <div class="content-body">
    <div class="card">
      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{url('member/search')}}" method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row">
                <div class="col-md-6">
                          <div class="form-group">

                            <input id="code" name="code" type="text"
                            value="{{$search['code']?$search['code']:''}}"
                            class="form-control" placeholder="Số điện thoại">
                          </div>
                  </div>



                  <div class="col-md-1">
                    <button type="submit" class="btn">Search</button>
                  </div>
                </div>
                  </div>
            </form>

      </div>
    <!--  End Header -->

      <!-- Members -->
        <div class="card-block" >
            <div class="row">

              <div class="col-md-3 card-title">
                    <strong>
                  Thành viên
                  </strong>
              </div>
              <div class="col-md-2 card-title">
                    <strong>
                  Sinh nhật
                  </strong>
              </div>
              <div class="col-md-2 card-title">
                    <strong>
                  Công ty
                  </strong>
              </div>
              <div class="col-md-2 card-title">
                    <strong>
                  Khu Vực
                  </strong>
              </div>
              <div class="col-md-1 card-title">
                    <strong>
                    Điểm
                  </strong>
              </div>

          </div>
        @foreach( $member as $mem)

        <form class="form" method="post" action="{{url('member/action')}}">
          <input type="hidden" name="_token"     value="{{csrf_token()}}">
          <input type="hidden" name="mem_id"     value="{{$mem->id}}">

        <div class="form-body">
            <div class="row form-section" >


              <div class="col-md-3">
                <h4 class="card-title">
                  <strong>{{$mem->name}} </strong>
                </h4>

                <ul class="list-unstyled">
                    <li class="nav-item">+ {{$mem->national}} <strong>{{$mem->number}}</strong>
                  </li>
                  <li class="nav-item">
                  <span class="text-info">
                    {{$mem->email}}
                  </span>
                </li>
              </ul>

                </div>
                <div class="col-md-2 card-title">
                    {{ date('Y-m-d', strtotime($mem->birthday)) }}
                </div>
                <div class="col-md-2 card-title">

                    {{$mem->work}}

                </div>
                <div class="col-md-2 card-title">
                    {{$mem->city}}

                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <a href="{{url('member/point/'.$mem->id)}}">
                    <span class="btn btn-outline-blue-grey">

                          {{$mem->redeempoint}}

                        </span>
                    </a>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">


                  <div class="btn-group" >
                    <?php
                        if($mem->status == 'active'){
                    ?>
                            <span class="btn btn-outline-blue-grey">
                                Hoạt động
                              </span>
                            <button type="submit" name="action" value="lock"
                              class="btn btn-warning">
                              Khóa </button>
                      <?php }else{ ?>

                          <span class="btn btn-outline-blue-grey">
                              Khóa
                            </span>
                          <button type="submit" name="action" value="unlock"
                          class="btn btn-success">
                              Mở khóa </button>
                      <?php } ?>
                    </div>




                  </div>
                </div>


              </div>


            </div>
          </form>
        @endforeach
        <div>
      </div>
      <!--End Member -->

          {{ $query->render() }}
    </div>
  </div>
</div>

@endsection
