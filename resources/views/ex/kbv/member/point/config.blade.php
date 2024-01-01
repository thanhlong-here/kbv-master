
@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Tặng điểm khi đăng ký </span>
      </h4>

    </div>

  </div>
  <div class="content-body">
    <div class="col-md-8 col-xs-8 offset-xs-2 box-shadow-1 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

      <!-- Header -->

      <!--  End Header -->
      <div class="card-block">
      <div class="row">
        <div class="col-md-4">
            <div class="card-title">
              <strong>Điểm giới thiệu </strong>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-title">
              <strong>Điểm đăng ký</strong>
            </div>
        </div>


      </div>

      <form class="form" method="post" action="{{url('config-point-ref/update')}}">
        <input type="hidden" name="_token"     value="{{csrf_token()}}">
        <input type="hidden" name="id" value="{{ $config->id ? $config->id : '' }}">
      <div class="form-body">
          <div class="row" >

          <div class="col-md-4">
          <input type="text" value="{{$config->presenter_point}}" name="presenter_point" class="form-control">
          </div>
          <div class="col-md-4">
                <input type="text" value="{{$config->presentee_point}}" name="presentee_point" class="form-control">
          </div>
          <div class="col-md-4">
                <button type="submit" value="delete" name="action" id="action"
               class="btn btn-warning">
	                    <i class="fa fa-check"></i>  Cập nhật
	            </button>
          </div>
      </div>
        </form>

        </div>

      </div>


    </div>
  </div>
  </div>
</div>

@endsection
