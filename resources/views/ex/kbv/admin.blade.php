@extends('ex.kbv.master')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Phân quyền </span>
      </h4>
    </div>

  </div>
  <div class="content-body">
    <!-- Change Pass -->
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">
            Thay đổi mật khẩu
        </h4>
      </div>
      <div class="card-block">
      <form class="form" action="{{url('admins/changepass')}}" method="post">
          <input type="hidden" name="_token" value="{{csrf_token()}}" >
            <div class="col-md-4">

              <input type="password"
              class="form-control"
              placeholder="Mật khẩu cũ"

              name="old" id="old"  />

              </div>




            <div class="col-md-4">
              <input type="password"
              class="form-control"
              placeholder="Mật khẩu mới"

              name="new" id="new"  />
            </div>
            <div class="col-md-1">
              <button type="submit" name="change"
               class="btn btn-primary mr-1">
               Đổi mật khẩu</button>
            </div>
      </form>
    </div>
    </div>

<!-- Roles -->
<div class="card">
  <div class="card-header">
  <div class="row">
    <div class="col-md-2">
      <h4 class="card-title">
          Vai trò
      </h4>

    </div>

    <div class="col-md-3">
      <h4 class="card-title">
          User
      </h4>
    </div>
    <div class="col-md-4">
      <h4 class="card-title">
          Mật khẩu
      </h4>
    </div>
  </div>

  <div class="row">

<form class="form" action="{{url('admins/add')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}" >
      <div class="col-md-2">


          <select class="form-control" name="role" id="role">
              @foreach($roles as $key => $value)
                <option value="{{$key}}"> {{$value}}  </option>
              @endforeach
          </select>
        </div>


      <div class="col-md-3">
          <input type="text"
          class="form-control"
          placeholder="user"

          name="user" id="user"  />
      </div>

      <div class="col-md-4">
        <input type="password"
        class="form-control"
        placeholder="Mật khẩu"

        name="pass" id="pass"  />
      </div>
      <div class="col-md-1">
        <button type="submit" name="add"
         class="btn btn-primary mr-1">
         Tạo mới</button>
      </div>
</form>
    </div>

  </div>



  <div class="card-block" >
    @foreach( $records as $rec)
      <div class="row">
          <form class="form" action="{{url('admins/action')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" >
            <input type="hidden" name="id"     value="{{$rec->id}}" >

              <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" name="role" id="role">
                        @foreach($roles as $key => $value)
                          <option
                          <?php if($rec->role == $key)
                              echo 'selected'
                            ?>
                           value="{{$key}}"> {{$value}}  </option>
                        @endforeach
                    </select>
                  </div>
              </div>


              <div class="col-md-3">

                    <div class="form-group">
                        <p class="form-control">
                        {{$rec->name}}
                      </p>
                      </div>
              </div>
              <div class="col-md-4">
                <input type="password"
                class="form-control"
                placeholder="Mật khẩu mới"

                name="pass" id="pass"  />
              </div>




              <div class="col-md-3">
                  <button type="submit" name="action" value="update" class="btn btn-primary mr-1">cập nhật</button>
                @if($rec->status =='lock')
                <div class="btn-group">
                                                                <span class="btn btn-outline-blue-grey">
                                              Đã khóa
                                              </span>
                                              <button type="submit" name="action" value="unlock"  class="btn btn-info">Mở khóa</button>

                                                          </div>
                  @else
                <div class="btn-group">
                                                                <span class="btn btn-outline-blue-grey">
                                                Hoạt động
                                              </span>
                                              <button type="submit" name="action" value="lock"  class="btn btn-warning">Khóa</button>

                                                          </div>
                @endif

              </div>
            </form>

        </div>


    @endforeach
    </div>

<div class="card-footer">
  {{$query->render()}}
</div>

  </div>
<!--End -->


  </div>
</div>

@endsection
