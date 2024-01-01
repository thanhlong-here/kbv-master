@extends('.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">

      <div class="card">
        <div class="card-block">
          <form class="form" action="{{url('screen/send')}}" method="post">
                      <div class="form-body">


                          <h4 class="form-section"><i class="ft-mail"></i> Phản hồi</h4>
                          <div class="row">
                            <div class="form-group col-xs-12 mb-2">
                              <label for="userinput5">Email</label>
                  <input class="form-control border-primary" type="email"
                  placeholder="email" name="email" id="email" required
                        value="{{$email}}"
                  >
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-xs-12 mb-2">
                              <label for="userinput5">Chủ đề</label>
                          <input class="form-control border-primary"
                          type="text" placeholder="chủ đề"
                          name="topic" id="topic">
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-xs-12 mb-2">
                              <label for="userinput8">Nội dung</label>
                                <textarea id="info" rows="5" required class="form-control border-primary" name="info" ></textarea>
                            </div>
                          </div>
            </div>

                        <div class="form-actions right">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Gửi
                            </button>
                        </div>
                    </form>
          </div>
        </div>
  </div>
</div>

@endsection
