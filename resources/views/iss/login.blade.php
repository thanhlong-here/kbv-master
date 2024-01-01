@extends('welcome')
@section('content')
<div class="content-wrapper">

  <div class="content-body">


    <div class="col-md-6 offset-md-2 col-xs-10 offset-xs-1 box-shadow-1 p-0">
      <div class="card border-grey border-lighten-3 m-0">

      <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

      <div class="card-body collapse in">
        <div class="card-block">
          <form class="form-horizontal form-simple"
           method="post" >

           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <input type="hidden" name="step"  value="{{$step}}">

@if(!$user)
<div class="card-header no-border">
  <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
    <span>Login Issuer</span></h6>

  </div>
            <fieldset class="form-group">

              <div class="col-md-9">
                <input type="text" class="form-control form-control-lg input-lg"
                id="user" name="user"
                placeholder="User">
              </div>
              <div class="col-md-3" >

                <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Next </button>

              </div>
            </fieldset>

@else
  <div class="card-header no-border">
          <h2 class="card-subtitle line-on-side text-muted text-xs-center">
            <span>  <a href="{{url('/')}}">
              {{$user}}</a> </span></h2>
    </div>
    <fieldset class="form-group">

        <div class="col-md-9">
          <input type="password" class="form-control form-control-lg input-lg"
          id="pass" name="pass" placeholder="Password" >
        </div>
        <div class="col-md-3" >
          <button type="submit" class="btn btn-primary btn-lg btn-block">
            Login </button>
        </div>
    </fieldset>

    <input type="hidden" name="user"  value="{{$user}}">
@endif
        </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

@endsection
