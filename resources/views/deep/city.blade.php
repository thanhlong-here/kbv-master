@extends('deep')
@section('content')
<?php
  function selected($key){
      if( $key == 'VN') return 'selected';
  }
?>
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title ">
        <a href="{{url('country')}}"> Country : </a> {{$country->name}}

    </h4>


    </div>

  </div>
  <div class="content-body">
<div class="card">
  <!-- Countries -->
    <div class="card-block" >
        <div class="row">

          <div class="col-md-2">
              <div class="form-group">
                <strong>Post Code</strong>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <strong>Name</strong>
              </div>
          </div>


        </div>

      @foreach( $cities as $city )

            <div class="row">


                <div class="col-md-2">
                  <div class="form-group">
                    <p>
                        {{$city->postcode}}
                    </p>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <p>
                        {{$city->name}}
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
