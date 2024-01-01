@extends('master')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h4 class="content-header-title">Dashboard</h4>
    </div>

  </div>
  <div class="content-body">
    <div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
              <div class="card">
                  <div class="card-body">
                      <div class="card-block">
                          <div class="media">
                              <div class="media-body text-xs-left">
                                  <h3 class="success">{{$report['member']}}</h3>
                                  <span>Thành viên</span>
                              </div>
                              <div class="media-right media-middle">
                                  <i class="ft-user-plus success font-large-2 float-xs-right"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="primary">{{$report['news']}}</h3>
                                <span>Tin tức</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="ft-bell primary font-large-2 float-xs-right"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="warning">{{$report['release']}}</h3>
                                <span>Mã khuyến mãi</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="ft-box danger font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
