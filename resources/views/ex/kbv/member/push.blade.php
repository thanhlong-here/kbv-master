@extends('ex.kbv.review')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('member')}}">Thành viên: </a></h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
<div class="col-md-8 col-xs-10 offset-xs-1 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
<div class="card-header">
  <h4> {{$mem->phone}} </h4>
</div>
  <div class="card-body collapse in">

    <div class="card-block">
      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('member/send')}}">

       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <input type="hidden" name="phone" value="{{$mem->phone}}">


  <fieldset class="form-group">

          <div class="col-md-10">
            <input type="text" class="form-control form-control-lg input-lg"
            id="message" name="message"
            placeholder="Tin nhắn" >
          </div>
          <div class="col-md-2" >

            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Gửi </button>
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
