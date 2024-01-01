@extends('deep')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Domains </span>
      <a class="btn btn-success" href="{{url('domain/new')}}" >New</a>
    </h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">


<!-- Domains -->
  <div class="card-block" >
      <div class="row">

        <div class="col-md-6">
            <div class="form-group">
              <strong>Secret</strong>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <strong>User</strong>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <strong>Domain</strong>
            </div>
        </div>
      </div>
    @if($domains)
    @foreach( $domains as $dm)

          <div class="row">

            <form class="form" action="domain/edit" method="post">

              <div class="col-md-6 ">
                <div class="form-group">
                  <p>
                      {{$dm->secret}}
                  </p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <p>
                    {{$dm->user()->public}}
                  </p>
                </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">

                    <input id="domain" name="domain" type="text" class="form-control" value="{{$dm->name}}">

                  </div>
              </div>
              <div class="col-md-1">


              <input type="hidden" name="_token" value="{{csrf_token()}}" >
              <input type="hidden" name="domain_id" value="{{$dm->id}}" >
              <button type="submit" class="btn btn-primary mr-1">Update</button>
            </div>
            </form>

            <div class="col-md-1">
              <form class="form" action="domain/del" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" >
                  <input type="hidden" name="domain_id" value="{{$dm->id}}" >
                  <button type="submit" class="btn btn-danger mr-1">Delete</button>
                </form>
            </div>

          </div>

    @endforeach
    @endif
</div>
<!--End Domains -->


</div>
  </div>
</div>

@endsection
