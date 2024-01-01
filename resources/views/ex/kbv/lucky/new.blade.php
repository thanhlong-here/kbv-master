@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('lucky')}}"> Xổ số trúng thưởng</a></h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
<div class="col-md-8 offset-md-2 col-xs-8 offset-xs-1 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <div class="card-block">
      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('lucky/add')}}">

       <input type="hidden" name="_token" value="{{csrf_token()}}">



        <fieldset class="form-group">

          <div class="row">
            <div class="form-group position-relative has-icon-left mb-1 col-md-12 ">

              <input type="text" class="form-control form-control-lg input-lg"
              id="title" name="title"
              placeholder="Chiến dịch" >
              <div class="form-control-position">
                  <i class="ft-box"></i>
              </div>
          </div>


        </div>

  <div class="row">

            <div class="col-md-4">


            <div class="input-group ">
              	<span class="input-group-addon">Điểm đổi :</span>
								<input type="number" class="form-control form-control-lg input-lg"
                id="point" name="point" value="100"
                placeholder="Điểm  đổi">

							</div>
            </div>
            <div class="col-md-6">


            <div class="input-group ">
              	<span class="input-group-addon">Ngày xổ số :</span>
                <input type="date" value="{{$today}}"
                class="form-control form-control-lg input-lg"
                id="end"
                name="end" >

							</div>
            </div>
            <div class="col-md-2">
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
