@extends('.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">Cấu hình</h4>
    </div>

  </div>
  <div class="content-body">

  <div class="card col-md-6 offset-md-3 ">
    <form class="form" action="{{url('config')}}" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}">

                  <div class=" card-block form-body">




                      <div class="row">
                          <div class="form-group col-xs-12 mb-2">
                              <label >Thời gian chấp nhận mã :</label>
                              <input type="date" id="begin" class="form-control"
                              name="begin"
                               value="{{$items['begin']}}" >
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-xs-12 mb-2">
                              <label >Email nhận phản hồi :</label>
                              <input type="email" id="email"
                              class="form-control" placeholder="email"
                              name="email"
                              value="{{$items['email']}}" >
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-xs-12 mb-2">


                                <input type="checkbox" name="lock_area" value='true'
                                  {{ $items['lock.area'] }}
                                >

                                <span class="custom-control-description">Khóa  chỉnh khu vực</span>

                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-xs-12 mb-2">


                                <input type="checkbox" name="lock_screen_game" value='true'
                                  {{ $items['lock.screen.game'] }}
                                >

                                <span class="custom-control-description">Khóa  màn hình game</span>

                          </div>
                      </div>


        </div>

                    <div class="form-actions">

                        <div class="form-group col-xs-2 mb-2">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-check-square-o"></i> Cập nhật
                          </button>
                      </div>
                    </div>
                </form>
      </div>


</div>
  </div>
</div>

@endsection
