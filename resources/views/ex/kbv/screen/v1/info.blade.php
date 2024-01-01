@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">

      <div class="card">
        <div class="card-block">
          <form class="form" action="{{url('screen/update')}}" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="mem_id" value="{{$mem->id}}">
                      <div class="form-body">


                          <h4 class="form-section"><i class="ft-user-plus"></i> Thông tin</h4>

                          <div class="row">
			                        <div class="form-group col-xs-12 mb-2">
                                  <label >Họ tên :</label>
			                            <input type="text" id="name" class="form-control"
                                   placeholder="Họ tên" name="name"
                                   value="{{$mem->name}}" >
			                        </div>
			                    </div>
                          <div class="row">
                              <div class="form-group col-xs-12 mb-2">
                                  <label >Công ty :</label>
                                  <input type="text" id="work"
                                  class="form-control" placeholder="Công ty"
                                  name="work"
                                  value="{{$mem->work}}" >
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-xs-12 mb-2">
                                <label >Chức vụ :</label>
                                  <input type="text" id="job"
                                  class="form-control" placeholder="Chức vụ"
                                  name="job"
                                  value="{{$mem->job}}" >
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group col-xs-12 mb-2">
                                <label >Địa chỉ :</label>
                                  <input type="text" id="address" class="form-control"
                                   placeholder="Địa chỉ"
                                   name="address"
                                   value="{{$mem->address}}" >
                              </div>
                          </div>


                          <div class="row">
                              <div class="form-group col-xs-12 mb-2">

                                  <label >Sinh nhật :</label>
                                     <input type="date" class="form-control"
                                     id="birthday"
                                     name="birthday"
                                     max="{{$mday}}"
                                     value="{{ date('Y-m-d', strtotime($mem->birthday)) }}"
                                     >
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-xs-12 mb-2">
                              <label >Email :</label>
                  <input class="form-control border-primary" type="email"
                  placeholder="Email" name="email" id="Email"
                    value="{{$mem->email}}"
                  >
                            </div>
                          </div>
                        <div class="row">
                            <div class="form-group col-xs-12 mb-2">
                              <label >Tỉnh thành :</label>
                          <select class="form-control" id="cities"

                          {{$locks['area'] =='true' ? 'disabled' :''}}

                          name="cities" >
                            <?php foreach ($cities as $city): ?>
                                <option value="{{$city->id}}"
                                  <?php if( $city->id == $mem->area) echo 'selected'  ?>
                                  >{{$city->name}}</option>
                            <?php endforeach; ?>

                            </select>
                              </div>
                          </div>
            </div>

                        <div class="form-actions">
                            <div class="form-group col-xs-10 mb-2">
                                <a href="{{url('screen/history')}}">
                              <div class="btn btn-success">

                                  Tổng : {{$mem->redeempoint}} (điểm)

                              </div>
                                </a>
                            </div>
                            <div class="form-group col-xs-2 mb-2">
                              <button type="submit" class="btn btn-primary pull-right">
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
