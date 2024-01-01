@extends('iss')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        {{$r['header']}}</h4>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-10 offset-md-1 ">
    <form class="form form-horizontal"
    action="{{$r['action']}}"
    method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="pmo_id" value="{{$pmo->id}}" >
        <div class="row">
          <div class="col-md-6  box-shadow-1 ">
            <div class="card-block">
            <img class="card-img-top img-fluid"
            src="{{$pmo->img}}">


        </div>

        </div>

          <div class="col-md-6 ">
            <div class="px-1 py-1">

              <div class="form-group">
                  <label >Title</label>

                  <input type="text" class="form-control"

                  name="title" id="title"
                  value="{{$pmo->message()->title}}"

                  placeholder="title" >

              </div>
                <div class="form-group">
                    <label> Content</label>

                    <textarea  rows="5" class="form-control"
                    name="content" id="content"
                    placeholder="Content">{{$pmo->message()->content}}</textarea>

                </div>



            </div>

        </div >
      </div>

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
