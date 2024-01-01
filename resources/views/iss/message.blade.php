@extends('iss')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Messages </span>
      <a class="btn btn-success" href="{{url('/message/new')}}" >New</a>
    </h4>
    </div>

  </div>
  <div class="content-body">
    <div class="card">
      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{url('message/search')}}" method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row">
                <div class="col-md-4">
                          <div class="form-group">

                            <input id="title" name="title" type="text"
                            class="form-control" placeholder="title">
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
        <div class="col-md-4 ">
            <div class="card-title">
              <strong>Title</strong>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-title">
              Created
            </div>
        </div>


      </div>

      @foreach( $messages as $mess)
        <div class="row">
          <div class="col-md-4 ">
                <p>
                <a href="{{url('message/detail/'.$mess->id)}}">
                  {{$mess->title}}
                  </a> 
                </p>
          </div>

          <div class="col-md-2">
              <p>{{$mess->created_at}}</p>
          </div>


        </div>
      @endforeach

      </div>


    </div>
  </div>
</div>

@endsection
