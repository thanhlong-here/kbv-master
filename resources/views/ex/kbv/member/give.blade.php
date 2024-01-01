@extends('ex.kbv.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('member')}}"> Thành viên </a></h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
<div class="col-md-8 offset-md-2 col-xs-8 offset-xs-2 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <h4 class="card-title">
        {{ $total }} thành viên được tặng
    </h4>
    <div class="card-block">
      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('member/up')}}">


       <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-body">

       <fieldset class="form-group">
         <div class="row">
         <div class="col-md-10">
           <input class="form-control form-control-lg input-lg"
           id="note"
           name="note"
           placeholder="Lý do tặng điểm"/>
         </div>
         <div class="col-md-2">
           <input type="number" class="form-control"
           id="point" name="point"
           value="0" >
         </div>
         </div>
       </fieldset>

       </div>
       <div class="form-actions right">




          <button type="submit"
             name  = "up"
             id    = "up"
             class="btn btn-primary btn-lg">
            Tặng điểm</button>
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
