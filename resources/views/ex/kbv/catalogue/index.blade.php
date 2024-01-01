
@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Catalogues </span>
      <a class="btn btn-success" href="{{url('/catalogue/new')}}" >Tạo mới</a>
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
                <div class="col-md-4">
                          <div class="form-group">

                            <input id="name" name="name" type="text"
                            value="{{$search['name']}}"
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
              <strong>Tiêu đề </strong>
            </div>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-1">
            <div class="card-title">
              <strong>Xoá</strong>
            </div>
        </div>

      </div>

      @foreach( $news as $ne)
      <form class="form" method="post" action="{{url('catalogue/action')}}">
        <input type="hidden" name="_token"     value="{{csrf_token()}}">
        <input type="hidden" name="catalogue_id" value="{{$ne->id}}">
      <div class="form-body">
          <div class="row form-section" >

          <div class="col-md-8 ">
                <p>
                <a href=" {{url('catalogue/id/'.$ne->id)}}">
              <strong>     {{$ne->name}} </strong>
                  </a>
                </p>
                <p>
                Cập nhật lúc :     {{$ne->updated_at}}
                </p>
          </div>
          <div class="col-md-1">
          </div>
          <div class="col-md-1">
<button type="submit" value="delete" name="action" id="action"
               class="btn btn-warning">
	                    <i class="fa ft-x"></i>
	            </button>
          </div>
          <div class="col-md-1">

              
          </div>
      </div>
        </form>

        </div>
      @endforeach

      </div>

    {{ $news->render() }}

    </div>
  </div>
</div>

@endsection
