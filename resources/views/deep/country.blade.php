@extends('deep')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title ">
         Countries

    </h4>
    <form class="form " action="{{url('country')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" >
        <button type="submit" class="btn btn-danger mr-1">Sync : country.io</button>
      </form>

    </div>

  </div>
  <div class="content-body">
<div class="card">
  <!-- Countries -->
    <div class="card-block" >
        <div class="row">

          <div class="col-md-3">
              <div class="form-group">
                <strong>Name</strong>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <strong>Captail</strong>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
                <strong>Code</strong>
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
                <strong>Iso</strong>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                <strong>Phone</strong>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                <strong>Currency</strong>
              </div>
          </div>

        </div>

      @foreach( $countries as $country )

            <div class="row">


                <div class="col-md-3 ">
                  <div class="form-group">
                    <p>
                      <a href="{{url('country/'.$country->code)}}">
                        {{$country->name}}
                      </a>
                    </p>
                  </div>
                </div>

                <div class="col-md-3 ">
                  <div class="form-group">
                    <p>
                        {{$country->captail}}
                    </p>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <p>
                      {{$country->code}}
                    </p>
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <p>
                      {{$country->iso}}
                    </p>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <p>
                      {{$country->phone}}
                    </p>
                  </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                      <p>
                        {{$country->currency}}
                      </p>
                    </div>
                </div>




            </div>

      @endforeach
  </div>
  <!--End Domains -->
</div>
  </div>
</div>

@endsection
