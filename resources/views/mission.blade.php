@extends('.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Nhiệm vụ </span>
          <a class="btn btn-success" href="{{url('mission/new')}}" >Tạo mới</a>
      </h4>
    </div>

  </div>
  <div class="content-body">
    <div class="card">
      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{url('mission/search')}}" method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row">

                <div class="col-md-4">
                          <div class="form-group">

                            <input id="name" name="name" type="text"
                            value="{{$search?$search['name']:''}}"
                            class="form-control" placeholder="Tên sản phẩm">
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

      <!-- missions -->
        <div class="card-block" >
            <div class="row">
              <div class="col-md-2 card-title">
                CODE
              </div>

              <div class="col-md-6 card-title">
                    <strong>
                    Tên Sản Phẩm
                  </strong>
              </div>

              <div class="col-md-4 card-title">
                    <strong>
                    Áp dụng điểm Thưởng
                  </strong>
              </div>

          </div>
        @foreach( $missions as $mission)

        <form class="form" method="post" action="{{url('mission/action')}}">
          <input type="hidden" name="_token"     value="{{csrf_token()}}">
          <input type="hidden" name="product_id" value="{{$mission->product_id}}">
          <input type="hidden" name="product_name" value="{{$mission->product_name}}">
        <div class="form-body">
            <div class="row form-section" >

              <div class="col-md-2">
                  <div class="card-title">
                    <a href="{{url('mission/id/'.$mission->product_id)}}">
                    <strong>{{$mission->product_code}}</strong>
                    </a>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="card-title">
                    {{$mission->product_name}}
                    <div>
                      [BARCODE : <strong>{{$mission->barcode}} </strong>]
                    </div>
                  </div>

                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <strong> {{ strtoupper($mission->pr_status)}} </strong>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">

                    <input id="redeem" name="redeem" type="number"
                    class="form-control" value="{{$mission->points}}">
                  </div>
                </div>

                <div class="col-md-1">
	                   <button type="submit" name="action" id="action"
                     value="cancel"
                     class="btn btn-warning">
	                         Cancel
	                    </button>
                </div>
                <div class="col-md-1">
	                     <button type="submit" name="action" id="action"
                       value="save" class="btn btn-primary mr1">
	                                Save
	                      </button>

                </div>
              </div>


            </div>
          </form>
        @endforeach
        <div>
      </div>
      <!--End missions -->
{{$query->render()}}
    </div>
  </div>
</div>

@endsection
