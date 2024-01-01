@extends('root')
@section('content')


<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Issuer </span>
      <a class="btn btn-success" href="{{url('issuer/new')}}" >New</a>
    </h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">

  <!-- Header -->
  <div id="search" class="card-block" >

      <form class="form" action="{{url('issuer/search')}}" method="post">
        <div class="form-actions top clearfix">
          <input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="row">
            <div class="col-md-4">
                      <div class="form-group">

                        <input id="name" name="name" type="text"
                        class="form-control" placeholder="issuer">
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
          <div class="col-md-4 ">
              <div class="card-title">
                <strong>Issuer</strong>
              </div>
          </div>

          <div class="col-md-2">
              <div class="card-title">
                Created
              </div>
          </div>
          <div class="col-md-2">
              <div class="card-title">
                Type
              </div>
          </div>

        </div>
    @foreach( $issuers as $iss)

        <div class="row bottom">

          <div class="col-md-4">
              <div class="form-group">
                   <p><a href="{{url('issuer/'.$iss->id)}}">  {{$iss->title}} </a> </p>
              <div class="tag tag-primary">

                     Account :
                     <strong> {{$iss->user()->public }}</strong>
              </div>

              <div class="tag tag-warning">

                    <strong> {{$iss->status}}</strong>
              </div>

              </div>
              <div class="form-group">

              </div>

          </div>

          <div class="col-md-2">
              <div class="form-group">
                {{$iss->created_at}}
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                {{$iss->type}}
              </div>
          </div>
          <div class="col-md-1">

              <form class="form" action="issuer/del" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" >
                  <input type="hidden" name="issuer_id" value="{{$iss->id}}" >
                  <button type="submit" class="btn">
                    {{$iss->status ? 'deActive' : 'Active' }}

                  </button>
              </form>
          </div>
          <div class="col-md-1">
            <form class="form" action="issuer/del" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <input type="hidden" name="issuer_id" value="{{$iss->id}}" >
                <button type="submit" class="btn btn-danger mr-1">Delete</button>
            </form>
          </div>
        </div>
    @endforeach

  </div>
  <!--End Domains -->

</div>
  </div>
</div>

@endsection
