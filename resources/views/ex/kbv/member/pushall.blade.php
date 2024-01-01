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
<div class="col-md-6 offset-md-3 col-xs-6 offset-xs-1 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <div class="card-block">
      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('member/push')}}">


       <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-body">

       <fieldset class="form-group">


          <textarea class="form-control form-control-lg input-lg"
          id="content"
          placeholder="Nhập nội dung thông báo"
          rows="5"
          name="content" ></textarea>

       </fieldset>

       </div>
       <div class="form-actions right">

         <button type="submit"
          name  = "send"
          id    = "send"
          value="list" class="btn">
           Gửi theo danh sách : ({{$total}} thành viên)</button>

         <button type="submit"
            name  = "send"
            id    = "send"
            value="all" class="btn btn-primary">
           Gửi toàn bộ </button>

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
