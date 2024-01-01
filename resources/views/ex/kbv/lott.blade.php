@extends('ex.kbv.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Trả thưởng</span>

      </h4>
    </div>
    <div class=" content-header-right text-xs-right col-md-6 col-xs-12">
      <form class="pull-right" action="{{url('lott/export')}}"

      method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button class="btn btn-primary" type="submit" >
                Xuất dữ liệu
            </button>
      </form>
    </div>
  </div>
  <div class="content-body">
    <div class="card">

      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{url('lott/search')}}" method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="row">
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                              <div class="form-group">

                                <input id="name" name="name" type="text"
                                value="{{$search['name']}}"
                                class="form-control" placeholder="Tên thành viên">
                              </div>
                      </div>
                      <div class="col-md-4">
                                <div class="form-group">

                                  <input id="number" name="number" type="text"
                                  value="{{$search['number']}}"
                                  class="form-control" placeholder="Số điện thoại">
                                </div>
                        </div>


                </div>

                <div class="row">
                  <div class="col-md-4">
                            <div class="form-group">

                              <input id="title" name="title" type="text"
                              value="{{$search['title']}}"
                              class="form-control" placeholder="Chiến dịch">
                            </div>
                    </div>


                      <div class="col-md-2">
                                <div class="form-group">

                                  <input id="start" name="start" type="date"
                                  value=""
                                  class="form-control" >
                                </div>
                        </div>

                        <div class="col-md-2">
                                  <div class="form-group">

                                    <input id="end" name="end" type="date"
                                    value=""
                                    class="form-control">
                                  </div>
                          </div>
                          <div class="col-md-2">
                                    <div class="form-group">

                                      <input id="lucky" name="lucky" type="text"
                                      value="{{$search['lucky']}}"
                                      class="form-control" placeholder="Số May Mắn">
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
      <div class="card-block">
      <div class="row">
        <div class="col-md-2">
            <div class="card-title">
              <strong>Người nhận </strong>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-title">
            Khu vực
            </div>

        </div>

        <div class="col-md-4">
            <div class="card-title">
            Chiến dịch
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-title">
            Số may mắn
            </div>
        </div>
      </div>

      @foreach( $luckies as $lucky )

        <?php if(isset($lucky->id)){  ?>

        <div class="row">

          <form class="form" method="post" action="{{url('lott/action')}}">
            <input type="hidden" name="_token"     value="{{csrf_token()}}">
            <input type="hidden" name="lucky_id"     value="{{$lucky->id}}">

          <div class="form-body">
              <div class="row form-section" >

          <div class="col-md-2">


              <div>
                <span>{{$lucky->phone}}</span> </br>

                <span>
                  Điểm hiện tại : <strong>{{$lucky->points}}</strong></span>
                </div>
                <div class="card-title">
                <strong>  {{$lucky->name}}
                </strong>
              </div>
          </div>

          <div class="col-md-2">
              <p>  {{ $lucky->area }}</p>
          </div>
          <div class="col-md-4">


              <p>
                Ngày xổ : {{$lucky->end}} (
              <?php

                  $st = [
                    'active'    => 'Đang mở',
                    'deactive'  =>  'Tạm dừng',
                    'close'     =>  'Đã đóng',
                  ];

                  echo $st[$lucky->status];
              ?>
              )
            </p>
            <div class="card-title"> <strong>
              {{$lucky->title }}
            </strong>
            </div>
          </div>


          <div class="col-md-2">

                <p> Lúc :<strong> {{$lucky->created_at}} </strong></p>
                  <div class="card-title"> <strong>  {{$lucky->number }} </strong></div>
          </div>


        </div>
      </div>
    </form>
    </div>
    <?php } ?>
      @endforeach

      </div>
<div class="card-footer">
  {{$query->render()}}
</div>

    </div>
  </div>
</div>

@endsection
