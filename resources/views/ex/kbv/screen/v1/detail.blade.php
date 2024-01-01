@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">





      <div class="card">

        <div class="card-header">

        					<div class="row heading-elements">
        						<a href="{{url('screen/news')}}"><i class="ft-x-square font-large-1"></i></a>
        					</div>
        				</div>

        <div class="card-block">
          	<h4 class="card-title">{{$news->title}}</h4>

          <img class="card-img img-fluid mb-1"
          src="{{$news->img}}" >
            <div class="row">

                  <div class="card-text">
                      {!! $news->content !!}
                  </div>
            </div>
          </div>
            </div>



  </div>
</div>

@endsection
