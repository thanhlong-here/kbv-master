@extends('.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
      <a href="{{url('mission')}}">
          Nhiệm vụ
      </a>
      </h4>
    </div>

  </div>
  <div class="content-body">
    <div class="card">


      <!-- Serials -->
        <div class="card-block" >
            <div class="row">
              <div class="col-md-4 card-title">
                SERIAL_NO
              </div>



          </div>
        @foreach( $serials as $ser)

            <div class="row form-section" >

              <div class="col-md-4">
                  <div class="card-title">

                    <strong>{{$ser->SERIAL_NO}}</strong>

                  </div>
              </div>



              </div>


        @endforeach
        <div>
      </div>
      <!--End serials -->

    </div>
  </div>
</div>

@endsection
