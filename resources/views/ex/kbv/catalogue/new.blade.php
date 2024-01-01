@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('catalogue')}}"> Catalogue </a></h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
<div class="col-md-10 offset-md-2 col-xs-10 offset-xs-1 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <div class="card-block">
      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('catalogue/add')}}">

       <input type="hidden" name="_token" value="{{csrf_token()}}">




               <fieldset class="form-group">

                 <div class="col-md-3">
                   <input type="text" class="form-control form-control-lg input-lg"
                   id="name" name="name"
                   placeholder="Tên catalogue" >
                 </div>
                 <div class="col-md-9" >
                  <input type="text" class="form-control form-control-lg input-lg"
                   id="link" name="link"
                   placeholder="Link" >
                 </div>
               </fieldset>
                 <div class="col-md-9" >
                 </div>
                 <div class="col-md-3" >
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                     Next </button>
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
