@foreach( $news as $ne)

    <div class="card text-xs-center ">
      <div class="card-body ">

          <div class="card-block bg_new">
            <a href="{{url('screen/news/'.$ne->id)}}" >
                <img class="card-img img-fluid mb-1" src="{{$ne->img}}" >
            </a>
          </div>


      </div>
      <div class="card-header">
        <a href="{{url('screen/news/'.$ne->id)}}" >
            <h4 class="card-title">{{$ne->title}}</h4>
        </a>
      </div>
      </div>
@endforeach
