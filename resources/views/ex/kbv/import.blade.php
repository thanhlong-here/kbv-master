@extends('ex.kbv.review')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <h4 class="content-header-title pull-right">
  <a href="{{url('report')}}"> Quay lại</a>
       </h4>
  </div>
  <div class="content-body">

<div class="col-md-8 col-xs-10 offset-xs-1 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
      <div class="card-block text-xs-center">
    <form  class="form" action="{{url('report/csv')}}" enctype="multipart/form-data" method="post">


              <fieldset>
                <div class="input-group ">

                  <div class="form-control  ">
                      <label >Import từ file .csv</label>
                      <label class="custom-file center-block block">
                      <input type="file" id="file" name="file" accept=".csv"
                        class="" required>

                      </label>
                    <button type="submit" class="btn btn-info ">Tiếp tục</button>
                  </div>

                  </div>

              </fieldset>


    </form>

  </div>

</div>
</div>
</div>

</div>

@endsection
