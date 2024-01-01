@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('redeem')}}"> Quà đổi điểm </a></h4>
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
       action="{{url('redeem/add')}}">

       <input type="hidden" name="_token" value="{{csrf_token()}}">



        <fieldset class="form-group">

          <div class="row">
            <div class="form-group position-relative has-icon-left mb-1 col-md-12 ">

              <input type="text" class="form-control form-control-lg input-lg"
              id="title" name="title"
              placeholder="Quà đổi điểm" >
              <div class="form-control-position">
                  <i class="ft-box"></i>
              </div>
          </div>


        </div>

  <div class="row">

            <div class="col-md-9 ">


            <div class="input-group ">
              	<span class="input-group-addon">Giá trị (điểm) :</span>
								<input type="number" class="form-control form-control-lg input-lg"
                id="point" name="point" value="10"
                placeholder="Điểm  đổi">

							</div>
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Next </button>
            </div>

  </div>


        </fieldset>





    </form>
    </div>
  </div>
</div>
</div>
</div>
  </div>
</div>

@endsection
