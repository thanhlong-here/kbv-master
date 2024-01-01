@extends('.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">




      @foreach( $news as $ne)
      <div class="card">
        <div class="card-block">
  <div class="row">
  <a href="{{url('screen/news/'.$ne->id)}}" >
          <img class="card-img img-fluid mb-1"
          src="{{$ne->img}}" >
        </a>
    </div>
<a href="{{url('screen/news/'.$ne->id)}}" >
                <h4 class="card-title">{{$ne->title}}</h4>

                  </a>


          </div>
            </div>
      @endforeach


      <div class="card-footer">
            {{ $query->render() }}

      </div>



  </div>
</div>

@endsection
