@extends('ex.kbv.master')
@section('content')

<?php
  $role   = session('CurrentIssuer')->role;
  $start  = $search['start'] ? date('Y-m-d',strtotime($search['start'])) :'';
  $end    = $search['end'] ? date('Y-m-d',strtotime($search['end'])) :'';

  $bday_from  = $search['bday_from'] ? date('Y-m-d',strtotime($search['bday_from'])) :'';
  $bday_to    = $search['bday_to'] ? date('Y-m-d',strtotime($search['bday_to'])) :'';
?>
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">Hiện có :



    </h4>
    </div>
    <div class=" content-header-right text-xs-right col-md-6 col-xs-12">

            <a class="btn btn-info" href="{{url('member/notify')}}">
                Gửi thông báo
            </a>

            <form class="pull-right" action="{{url('member/export')}}"

            method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <button class="btn btn-primary" type="submit" >
                      Xuất dữ liệu
                  </button>
            </form>

  @if($role != 'editor')
            <a class="btn btn-warning" href="{{url('member/give')}}">Tặng điểm</a>
  @endif
        </div>


  </div>


  <div class="content-body">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-block">
            <h3 class="warning">
              {{$bdays}}
            </h3>
              <strong>

                thành viên sinh nhật trong ngày

              </strong>
          </div>

        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-block">
            <h3 class="info">
              {{$total}}
            </h3>
              <strong>thành viên</strong>
          </div>

        </div>
      </div>




      <div class="col-md-3">
        <div class="card">
          <div class="card-block">
          <h3 class="info">{{$points}} </h3>
          <strong>điểm khả dụng</strong>
        </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
<div class="card-block">
          <h3 class="primary">{{$accumulates}} </h3>
          <strong>
            điểm đã cấp
          </strong>
</div>
        </div>
      </div>

    </div>

    <div class="card">

      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{url('member/search')}}"
          enctype="multipart/form-data"
          method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="row">
                    <div class="col-md-2">
                      <label>
                        <input type="checkbox"
                        id="is_list" name="is_list"
                        {{$search['list'] ? 'checked' : ''}}
                        />
                        <strong>theo danh sách : </strong>
                      </label>


                        <input type="file" class="form-control"
                        id="list" name="list" />


                    </div>
                    <div class="col-md-2">
                        <label><strong>Theo điểm hiện tại : </strong></label>
                      <div class="row">

                          <div class="form-group col-md-6">
                            <input id="point_from" name="point_from" type="number"
                            value="{{$search['point_from']}}"
                            class="form-control" >

                        </div>
                        <div class="form-group col-md-6">

                          <input id="point_to" name="point_to" type="number"
                          value="{{$search['point_to']}}"
                          class="form-control" >
                        </div>

                      </div>
                    </div>
                      <div class="col-md-4">
                          <label><strong> Theo ngày đăng ký : </strong></label>
                          <div class="row">

                            <div class="form-group col-md-6">

                              <input id="start" name="start" type="date"
                              value="{{$start}}"
                              class="form-control" >
                            </div>

                            <div class="form-group col-md-6">

                              <input id="end" name="end" type="date"
                              value="{{$end}}"
                              class="form-control">
                            </div>
                          </div>

                        </div>

                    <div class="col-md-4">
                      <label><strong>Theo ngày sinh : </strong></label>
                    <div class="row">
                              <div class="form-group  col-md-6">

                                <input id="bday_from" name="bday_from" type="date"
                                value="{{$bday_from}}"
                                class="form-control">
                              </div>

                                <div class="form-group  col-md-6">

                                  <input id="bday_to" name="bday_to" type="date"
                                  value="{{$bday_to}}"
                                  class="form-control">
                                </div>
                        </div>
                      </div>
            </div>
          </div>
            <div class="form-actions top clearfix">
            <div class="row">

              <div class="col-md-2">
                        <div class="form-group">

                          <select class="form-control" id="area" name="area" >
                            <option value="" >--Khu Vực--</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="{{$city->id}}"
                                  <?php
                                  if( $search['area'] == $city->id) echo 'selected'  ?>
                                  >{{$city->name}}</option>
                            <?php endforeach; ?>

                            </select>
                        </div>
                </div>
              <div class="col-md-2">
                        <div class="form-group">

                          <input id="name" name="name" type="text"
                          value="{{$search['name']}}"
                          class="form-control" placeholder="Tên thành viên">
                        </div>
                </div>
                <div class="col-md-3">
                          <div class="form-group">

                            <input id="number" name="number" type="text"
                            value="{{$search['number']}}"
                            class="form-control" placeholder="Số điện thoại">
                          </div>
                  </div>
                  <div class="col-md-3">
                        <div class="form-group">
                              <div class="form-control">
                              <input id="bday"
                              name="bday"
                              {{$search['bday'] ? 'checked' : ''}}
                              type="checkbox">
                              <span>
                                   Sinh Nhật trong ngày
                              </span>
                            </div>
                          </div>
                    </div>
                  <div class="col-md-1">
                    <div class="form-group">


                      <button type="submit" class="btn btn-outline-primary btn-lg"> Tìm kiếm</button>
                    </div>

                  </div>
            </div>
                  </div>
            </form>

      </div>
    <!--  End Header -->

      <!-- Members -->
        <div class="card-block" >
            <div class="row">

              <div class="col-md-2 card-title">
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

              <div class="col-md-2 card-title">
                    <strong>
                    Xu / Điểm
                  </strong>
              </div>

          </div>
        @foreach( $member as $mem)

        <form class="form" method="post" action="{{url('member/action')}}">
          <input type="hidden" name="_token"     value="{{csrf_token()}}">
          <input type="hidden" name="mem_id"     value="{{$mem->id}}">

        <div class="form-body">
            <div class="row form-section" >


              <div class="col-md-2">
                <h6>
                  <a href="{{url('member/history/'.$mem->id)}}">
                    <strong>{{$mem->name}} </strong>
                  </a>

                </h6>

                <ul class="list-unstyled">
                    <li class="nav-item">+ {{$mem->national}} <strong>{{$mem->number}}</strong>
                  </li>
                  <li class="nav-item">
                  <span class="text-info">
                    {{$mem->email}}
                  </span>
                </li>
              </ul>
              <a href="{{url('member/push/'.$mem->id)}}" class="btn btn-info">
                  Gửi tin nhắn riêng
              </a>

                </div>
                <div class="col-md-2">
                  <strong>
                    {{ date('Y-m-d', strtotime($mem->birthday)) }}
                  </strong>
                </div>
                <div class="col-md-2">
                  <h6>
                    {{$mem->work}}
                  </h6>
                </div>
                <div class="col-md-2">
                    <h6>  {{$mem->city}}
                      </h6>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    @if($role != 'editor')
                    <a href="{{url('member/xu/'.$mem->id)}}">
                    <span class="btn btn-outline-blue-grey">

                          {{$mem->xu}}

                        </span>
                    </a>
                    @else
                    <span class="btn btn-outline-blue-grey">

                          {{$mem->xu}}

                        </span>
                    @endif
                    /
                    @if($role != 'editor')
                    <a href="{{url('member/point/'.$mem->id)}}">
                    <span class="btn btn-outline-blue-grey">

                          {{$mem->redeempoint}}

                        </span>
                    </a>
                    @else
                    <span class="btn btn-outline-blue-grey">

                          {{$mem->redeempoint}}

                        </span>
                    @endif
                  </div>
                </div>
                @if($role != 'editor')
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
                @endif

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

</div>


@endsection
