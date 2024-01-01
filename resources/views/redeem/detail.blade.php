@extends('.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title"><a href="{{url('redeem')}}"> Quà đổi điểm </a></h4>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-10 offset-md-1 ">
    <form class="form form-horizontal"
    action="{{url('redeem/edit')}}" enctype="multipart/form-data"
    method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="redeem_id" value="{{$redeem->id}}" >
        <div class="row">
          <div class="col-md-6  box-shadow-1 ">
            <div class="card-block  text-xs-center">

                    <p><img src="{{$redeem->media}}" class="rounded-circle  height-150" alt="Card image"></p>
                    <p><input type="file" name="media" id="media" ></p>
                    <p class="text-warning">1024 x 1024 </p>
            </div>
            <div class="form-group">

                <input type="text" class="form-control"

                name="title" id="title"
                value="{{$redeem->title}}"

                placeholder="Quà tặng" >

            </div>


        </div>

          <div class="col-md-6 ">
            <div class="px-1 py-1">

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                      <div class="form-group">

                          <input type="text" class="form-control"
                            name="code" id="code"
                            value="{{$redeem->code}}"  placeholder="Mã quà" >
                      </div>
                  </div>
                  <div class="col-md-6 ">


                  <div class="input-group ">
                      <span class="input-group-addon">Giá trị (điểm) :</span>
                      <input type="number" class="form-control form-control-lg input-lg"
                      id="point" name="point" value="{{$redeem->point}}"
                      placeholder="Điểm  đổi">

                    </div>
                  </div>


              </div>
            </div>




                <div class="form-group">


                    <textarea  rows="5" class="form-control"
                    name="sumary" id="sumary"
                    placeholder="Tóm tắt">{{$redeem->sumary}}</textarea>

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
