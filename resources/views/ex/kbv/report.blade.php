@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Nhận điểm</span>

      </h4>

    </div>
    <div class=" content-header-right text-xs-right col-md-6 col-xs-12">
      <form class="pull-right" action="{{url('report/export')}}"

      method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button class="btn btn-primary" type="submit" >
                Xuất dữ liệu
            </button>
      </form>

      <a class="btn btn-warning" href="{{url('report/import')}}">Import danh sách đổi trả</a>
    </div>
  </div>

  <div class="content-body">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-block">
            <h3 class="warning">
              {{$total}}
            </h3>
              <strong>

                Điểm đã quét

              </strong>
          </div>

        </div>
      </div>
    </div>
    <div class="card">

      <!-- Header -->
      <div id="search" class="card-block" >
          <div class="form-actions top clearfix">
              <div class="row">
          <form class="form" action="{{url('report/search')}}" method="post">

              <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="col-md-2">
                              <div class="form-group">

                                <select class="form-control" id="city" name="city" >
                                  <option value="" >--Khu Vực--</option>
                                  <?php foreach ($cities as $city): ?>
                                      <option value="{{$city->id}}"
                                        <?php
                                        if( $search['city'] == $city->id) echo 'selected'  ?>
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
                      <div class="col-md-2">
                                <div class="form-group">

                                  <input id="number" name="number" type="text"
                                  value="{{$search['number']}}"
                                  class="form-control" placeholder="Số điện thoại">
                                </div>
                        </div>
                        <div class="col-md-2">
                                  <div class="form-group">

                                    <input id="product" name="product" type="text"
                                    value="{{$search['product']}}"
                                    class="form-control" placeholder="Tên sản phẩm">
                                  </div>
                          </div>
                          <div class="col-md-2">
                                    <div class="form-group">

                                      <input id="seri_no" name="seri_no" type="text"
                                      value="{{$search['seri_no']}}"
                                      class="form-control" placeholder="Số Seri">
                                    </div>
                            </div>

                            <div class="col-md-1">
                                <button type="submit" class="btn">Search</button>
                            </div>

            </form>
          </div>


          </div>
          </div>

      <!--  End Header -->
      <div class="card-block">
      <div class="row">
        <div class="col-md-3">
            <div class="card-title">
              <strong>Thành viên </strong>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card-title">
              <strong>Khu vực </strong>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-title">
              <strong>Sản phẩm </strong>
            </div>
        </div>

        <div class="col-md-2 ">
            <div class="card-title">
              <strong>Seri No</strong>
            </div>
        </div>
      </div>

      @foreach( $rows as $row)
        <div class="row">
          <form class="form" method="post" action="{{url('report/action')}}">
            <input type="hidden" name="_token"     value="{{csrf_token()}}">
            <input type="hidden" name="release_id"  value="{{$row->id}}">

            <div class="form-body">
                <div class="row form-section" >
          <div class="col-md-3">
                <div class="card-title">

<p>

  {{$row->code}}

</p>
<strong>
                  {{$row->name}}
</strong>
                </div>

          </div>
          <div class="col-md-2 ">
                <div class="card-title">

                  {{$row->city ? $row->city->name :'' }}

                  </div>
          </div>
          <div class="col-md-3 ">
              <div class="card-title">

                  {{$row->product}}

                </div>
          </div>

          <div class="col-md-2 ">
              <p>Điểm nhận :  <strong> {{$row->point}} </strong> </p>
              <div class="card-title">

                <strong>  {{$row->seri_no}}

                </strong>
                </div>

          </div>
          <div class="col-md-1 ">
            <div class="form-group">
              <button type="submit" name="action" value="return"
                class="btn btn-warning">
                Đổi trả </button>

            </div>
          </div>
        </div>
      </div>
        </form>
        </div>
      @endforeach

      </div>
<div class="card-footer">
    {{ $query->render() }}
</div>
    </div>
  </div>
</div>

@endsection
