@extends('ex.kbv.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('news')}}"> Tin tức </a></h4>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-10 offset-md-1 ">
    <form class="form form-horizontal"
    action="{{url('news/edit')}}" enctype="multipart/form-data"
    method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="news_id" value="{{$news->id}}" >
        <div class="row">
          <div class="col-md-6  box-shadow-1 ">
            <div class="card-block  text-xs-center">

                    <img src="{{$news->media}}" class=" height-150" alt="Card image">
                    <input type="file" name="media" id="media" accept=".jpg,.gif,.png">
            </div>
            <div class="form-group">

                <input type="text" class="form-control"

                name="title" id="title"
                value="{{$news->title}}" required="true"

                placeholder="Tiêu đề" >

            </div>


        </div>

          <div class="col-md-6 ">
                <div class="form-group">

                    <textarea  rows="10" class="form-control summernote"
                    name="sumary" id="sumary"
                    placeholder="Tóm tắt">{{$news->content}}</textarea>

                </div>

                <div class="form-group">

                    <input type="text" class="form-control"

                    name="external" id="extenal"
                    value="{{$news->external}}"

                    placeholder="Liên kết ngoài" >

                </div>

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
