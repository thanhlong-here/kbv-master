@extends('.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Quà tặng </span>
      <a class="btn btn-success" href="{{url('/redeem/new')}}" >Tạo mới</a>
      </h4>

    </div>

  </div>
  <div class="content-body">
    <div class="card">
      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{$r['url.search']}}" method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row">
                <div class="col-md-8">
                          <div class="form-group">

                            <input id="title" name="title" type="text"
                            value="{{$search['title']}}"
                            class="form-control" placeholder="Tiêu đề">
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
        <div class="col-md-8 ">
            <div class="card-title">
              <strong>Quà </strong>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-title">
              Điểm
            </div>
        </div>


      </div>

      @foreach( $redeems as $re)


        <form class="form" method="post" action="{{url('redeem/action')}}">
          <input type="hidden" name="_token"     value="{{csrf_token()}}">
          <input type="hidden" name="redeem_id" value="{{$re->id}}">
        <div class="form-body">
            <div class="row form-section" >

            <div class="col-md-8 ">
                  <p>
                  <a href=" {{url('redeem/id/'.$re->id)}}">
                <strong>     {{$re->title}} </strong>
                    </a>
                  </p>
                  <p>
                  Cập nhật lúc :     {{$re->updated_at}}
                  </p>
            </div>
            <div class="col-md-2">
                <p>{{$re->point}}</p>
            </div>

            <div class="col-md-1">


                <button type="submit" value="delete" name="action" id="action"
                 class="btn btn-warning">
                        <i class="fa ft-x"></i>
                </button>
            </div>
        </div>
          </form>      @endforeach

      </div>

    {{ $query->render() }}

    </div>
  </div>
</div>

@endsection
