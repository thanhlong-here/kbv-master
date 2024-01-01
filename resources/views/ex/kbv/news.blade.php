
@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Tin tức </span>
      <a class="btn btn-success" href="{{url('/news/new')}}" >Tạo mới</a>
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
              <strong>Tiêu đề </strong>
            </div>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-1">
            <div class="card-title">
              <strong>Nổi bật</strong>
            </div>
        </div>

      </div>

      @foreach( $news as $ne)
      <form class="form" method="post" action="{{url('news/action')}}">
        <input type="hidden" name="_token"     value="{{csrf_token()}}">
        <input type="hidden" name="news_id" value="{{$ne->id}}">
      <div class="form-body">
          <div class="row form-section" >

          <div class="col-md-8 ">
                <p>
                <a href=" {{url('news/id/'.$ne->id)}}">
              <strong>     {{$ne->title}} </strong>
                  </a>
                </p>
                <p>
                Cập nhật lúc :     {{$ne->updated_at}}
                </p>
          </div>
          <div class="col-md-1">

              <button type="submit" value="push" name="action" id="action"
               class="btn btn-info">
	                    <i class="fa ft-bell"></i>
	            </button>
          </div>
          <div class="col-md-1">
            <?php
                $c = '';$v='hot';
                if($ne->hot) {
                    $c  = 'btn-primary';
                    $v  = 'not';
                }
            ?>

              <button type="submit" value="{{$v}}" name="action" id="action" class="btn {{$c}}">
	                    <i class="fa ft-star"></i>
	            </button>
          </div>
          <div class="col-md-1">

              <button type="submit" value="delete" name="action" id="action"
               class="btn btn-warning">
	                    <i class="fa ft-x"></i>
	            </button>
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
