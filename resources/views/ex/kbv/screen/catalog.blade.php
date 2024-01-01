@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper card">

  <div class="content-header row text-xs-center">
<a href="{{url('screen/info')}}" class="pull-left mb-1">
    <i class="ft-arrow-left"></i>
</a>

      <h4 class="card-title">
          Danh Mục Sản Phẩm
        </h4>
            </div>

  </div>


  <div class="content-body content-wrapper ">
    <iframe src="{{$catalog}}" height="100%" width="100%" frameBorder="0"></iframe>


    </iframe>

  </div>



</div>




@endsection
