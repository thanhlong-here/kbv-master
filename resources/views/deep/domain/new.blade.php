@extends('deep')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">Domain</h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
  <div class="col-md-6 offset-md-2 col-xs-10 offset-xs-1 box-shadow-1 p-0">
<div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <div class="card-block">
      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('domain/add')}}">

       <input type="hidden" name="_token" value="{{csrf_token()}}">

       <fieldset class="form-group position-relative has-icon-left mb-1">

         <input type="text" class="form-control form-control-lg input-lg"
         id="user" name="user" placeholder="User" required="">

         <div class="form-control-position">
             <i class="ft-unlock"></i>
         </div>
       </fieldset>

        <fieldset class="form-group position-relative has-icon-left">

          <input type="password" class="form-control form-control-lg input-lg"
          id="pass" name="pass" placeholder="Enter Password" required="">

          <div class="form-control-position">
              <i class="fa fa-key"></i>
          </div>
        </fieldset>
        <div class="row">
        <div class="col-md-8" >
                <fieldset class="form-group position-relative has-icon-left mb-1">

                  <input type="text" class="form-control form-control-lg input-lg"
                  id="domain" name="domain"
                  placeholder="domain">

                  <div class="form-control-position">
                      <i class="ft-globe"></i>
                  </div>
                </fieldset>

        </div>

        <div class="col-md-4" >

          <button type="submit" class="btn btn-primary btn-lg btn-block">
            Save </button>

        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
</div>
  </div>
</div>

@endsection
