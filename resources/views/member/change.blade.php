@extends('.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('member')}}">Thành viên </a> </h4>
    </div>

  </div>
  <div class="content-body">
<div class="card">
<div class="col-md-6  offset-xs-3 box-shadow-1 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">

  <div class="card-body collapse in">
    <div class="card-block">
      <h4 class="card-title">
        <strong>{{$mem->name}}</strong> có:
      </h4>

      <form class="form-horizontal form-simple"
       method="post"
       action="{{url('member/change')}}">

       <input type="hidden" name="_token" value="{{csrf_token()}}">
       <input type="hidden" name="mem_id" value="{{$mem->id}}">

<fieldset class="form-group">
        <div class="row">
          <div class="col-md-4">
            <div class="form-control">
                {{$mem->redeempoint}}
            </div>
          </div>
          <div class="col-md-4">
            <select class="form-control" id="change" name="change" >
              <option value="add" >Nạp thêm</option>
              <option value="sub" >Rút ra</option>
            </select>
          </div>
        <div class="col-md-4">
          <input type="number" class="form-control form-control-lg input-lg"
          id="point" name="point"
          value="0" >
        </div>

        </div>

</fieldset>


  <fieldset class="form-group">
          <div class="row">
            <div class="col-md-9">
              <input type="text" class="form-control form-control-lg input-lg"
              id="note" name="note"
              placeholder="Lý do" >
            </div>

            <div class="col-md-3" >

              <button type="submit" value="ok" class="btn btn-primary btn-lg btn-block">
                Duyệt
              </button>
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
