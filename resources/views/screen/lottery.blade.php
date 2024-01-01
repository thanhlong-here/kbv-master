@extends('.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">
    @if(session('lottery_memssage'))

    <div class="card">
				<div class="card-header card-head-inverse bg-success">
					<h4 class="card-title">{{ session('lottery_memssage') }}</h4>
					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
                <a data-action="close"><i class="ft-x"></i></a>
						
					</div>
				</div>

			</div>

    @endif
      <div class="card">

        <form class="form" action="{{url('screen/lucky')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="lottery_id" value="{{$lottery->id}}">
              <div class="form-body">


<h4 class="form-section">
<a href="{{url('screen/game')}}">
  <i class="ft-arrow-left"></i>
</a>
  {{$lottery->title}} </h4>
          <div class="card-block">

            <img class="card-img img-fluid mb-1"
            src="{{$lottery->img}}" >


                    <p class="card-text">
                        {{$lottery->content}}
                    </p>

            </div>
                 </div>

                 <div class="form-actions ">
                     <div class="form-group text-xs-center">
                       <?php if($lottery->status =='close' ){ ?>
                         <span class="btn btn-primary">
                              Chương trình đã đóng.
                         </span>

                       <?php  } else {?>
                       <?php if($lottery->need > 0 ){ ?>
                           <span class="btn btn-primary">
                                Bạn cần : {{$lottery->need}} (điểm) để tham gia.
                           </span>

                      <?php  } else { ?>
                            <button type="submit" name="number" id="number" class="btn btn-primary">
                                <i class="fa ft-plus"></i> Lấy số
                            </button>
                     <?php  }
                          } ?>

                   </div>
                 </div>
            </form>

        </div>
  </div>
</div>

@endsection
