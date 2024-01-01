@extends('ex.kbv.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <a href="{{url('lucky')}}"> Xổ số trả thưởng </a></h4>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-12">
    <form class="form form-horizontal"
    action="{{url('lucky/edit')}}" enctype="multipart/form-data"
    method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <input type="hidden" name="lottery_id" value="{{$lottery->id}}" >
        <div class="row">
          <div class="col-md-6  box-shadow-1 ">
            <div class="card-block  text-xs-center">

                    <img src="{{$lottery->media}}" class="rounded-circle  height-150" alt="Card image">
                    <input type="file" name="media" id="media" >
            </div>

            <div class="form-group">

                <input type="text" class="form-control"

                name="title" id="title"
                value="{{$lottery->title}}"
                required
                placeholder="Chiến dịch" >

            </div>

        </div>

          <div class="col-md-6 ">
            <div class="px-1 py-1">




              <div class="form-group">
                <div class="row">

                  <div class="col-md-4 ">


                  <div class="input-group ">
                      <span class="input-group-addon">Điểm đổi :</span>
                      <input type="number" class="form-control form-control-lg input-lg"
                      id="point" name="point" value="{{$lottery->redeempoint}}"
                      placeholder="Điểm  đổi" required>

                    </div>
                  </div>
                  <div class="col-md-8">


                                <div class="input-group ">
                                    <span class="input-group-addon">Ngày xổ:</span>
                                    <input type="date"
                                    class="form-control form-control-lg input-lg"
                                    id="end_at"
                                    name="end_at" required
                                    value="{{ date('Y-m-d', strtotime($lottery->end_at)) }}"
                                     >

                                  </div>
                  </div>

              </div>
              </div>



                <div class="form-group">


                    <textarea  rows="5" class="form-control"
                    name="sumary" id="sumary"
                    placeholder="Tóm tắt">{{$lottery->content}}</textarea>

                </div>

                <div class="form-group">


                  <input type="number" class="form-control"

                  name="result" id="result"
                  value="{{$lottery->result}}"

                  placeholder="Kết quả sổ xổ" >

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
