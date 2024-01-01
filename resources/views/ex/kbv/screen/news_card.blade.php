@foreach( $news as $ne)

    <div class="card text-xs-center ">
      <div class="card-body ">

          <div class="card-block bg_new" style="background-image: url('{{url("images/bg_new.jpg")}}')">
            <a href="{{url('screen/news/'.$ne->id)}}" >
                <img class="card-img img-fluid mb-1" src="{{$ne->img}}" >
            </a>
          </div>


      </div>
      <div class="card-header">
        <a href="{{url('screen/news/'.$ne->id)}}" >
            <h4 class="card-title"><strong>{{$ne->title}}</strong></h4>
        </a>
      </div>
      <hr class="bot"/>
      </div>
@endforeach
