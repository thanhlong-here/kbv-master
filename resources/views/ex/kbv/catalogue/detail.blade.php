@extends('ex.kbv.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('catalogue')}}"> Chỉnh sửa catalogue </a></h4>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-10 offset-md-1 ">
    <form class="form form-horizontal"
    action="{{url('catalogue/edit')}}" enctype="multipart/form-data"
    method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="catalogue_id" value="{{$catalogue->id}}" >
        <div class="row">
          <div class="col-md-3">

                <input type="text" class="form-control"

                name="name" id="name"
                value="{{$catalogue->name}}" required="true"

                placeholder="Tên catalogue" >

          </div>
          <div class="col-md-9">

                <input type="text" class="form-control"

                name="link" id="link"
                value="{{$catalogue->link}}" required="true"

                placeholder="Link" >

        </div>


        </div >


      <div class="form-actions right">
                    <button type="button" class="btn btn-warning mr-1">
                      <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
</form>

</div>
  </div>
</div>

@endsection
