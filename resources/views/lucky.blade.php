@extends('.master')
@section('content')

<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">
        <span> Xổ số trả thưởng</span>
          <a class="btn btn-success" href="{{url('lucky/new')}}" >Tạo mới</a>
      </h4>
    </div>

  </div>
  <div class="content-body">
    <div class="card">

      <!-- Header -->
      <div id="search" class="card-block" >

          <form class="form" action="{{url('lucky/search')}}" method="post">
            <div class="form-actions top clearfix">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row">
                <div class="col-md-8">
                          <div class="form-group">

                            <input id="title" name="title" type="text"
                            value="{{$search['title']}}"
                            class="form-control" placeholder="Chiến dịch">
                          </div>
                  </div>


                  <div class="col-md-2">
                    <button type="submit" class="btn">Search</button>
                  </div>
                </div>
                  </div>
            </form>

      </div>
      <!--  End Header -->
      <div class="card-block">
      <div class="row">
        <div class="col-md-4">
            <div class="card-title">
              <strong>Chiến dịch </strong>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-title">
            Ngày xổ
            </div>

        </div>

        <div class="col-md-2">
            <div class="card-title">
            Kết quả
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-title">
            Trạng thái
            </div>
        </div>
      </div>

      @foreach( $lotteries as $lucky )


        <div class="row">

          <form class="form" method="post" action="{{url('lucky/action')}}">
            <input type="hidden" name="_token"     value="{{csrf_token()}}">
            <input type="hidden" name="lucky_id"     value="{{$lucky->id}}">

          <div class="form-body">
              <div class="row form-section" >

          <div class="col-md-4 ">
                <p>
                <a href="{{url('lucky/id/'.$lucky->id)}}">
                  {{$lucky->title}}
                  </a>
                </p>
          </div>

          <div class="col-md-2">
              <p>  {{ date('d-m-Y', strtotime($lucky->end_at)) }}</p>
          </div>
          <div class="col-md-2">
              <p>   {{$lucky->result ? $lucky->result :'------' }}</p>
          </div>



          <div class="col-md-2">
            <?php  if($lucky->status=='close'){ ?>
                    <span class="btn btn-outline-blue-grey">
                        Đã đóng
                    </span>

            <?php } else{ ?>

                                <div class="btn-group" >
                                  <?php
                                      if($lucky->status == 'active'){
                                  ?>
                                          <span class="btn btn-outline-blue-grey">
                                              Hoạt động
                                            </span>
                                          <button type="submit" name="action" value="lock"
                                            class="btn btn-warning">
                                            Khóa </button>
                                    <?php }else{ ?>

                                        <span class="btn btn-outline-blue-grey">
                                            Khóa
                                          </span>
                                        <button type="submit" name="action" value="unlock"
                                        class="btn btn-success">
                                            Mở khóa </button>
                                    <?php } ?>
                                  </div>
                      <?php } ?>            

          </div>
          <div class="col-md-1">

              <button type="submit" value="delete" name="action" id="action"
               class="btn btn-warning">
                      <i class="fa ft-x"></i>
              </button>
          </div>

        </div>
      </div>
    </form>
    </div>
      @endforeach

      </div>


    </div>
  </div>
</div>

@endsection
