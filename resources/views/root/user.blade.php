@extends('root')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> User </span>
      <a class="btn btn-success" href="{{url('user/add')}}" >New</a>
    </h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
  <!-- Header -->
  <div id="search" class="card-block" >

      <form class="form" action="issuer/search" method="post">
        <div class="form-actions top clearfix">
          <input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="row">
            <div class="col-md-6">
                      <div class="form-group">

                        <input id="name" name="name" type="text" class="form-control" placeholder="name">
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



  <!-- Issuers -->
    <div class="card-block" >
        <div class="row">

          <div class="col-md-6">
              <div class="form-group">
                <strong>Name</strong>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                <strong>Date Create</strong>
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                <strong>Type</strong>
              </div>
          </div>
        </div>


  </div>
  <!--End Domains -->

</div>
  </div>
</div>

@endsection
