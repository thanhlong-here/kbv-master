@extends('.screen')
@section('content')
<div class="content-wrapper">
  <div class="content-header row text-xs-center">



          <div class="btn-group" >
            <button type="button" class="btn btn-success">
            Phần thưởng</button>
  <span class="btn btn-outline-blue-grey">
                  <a href="{{url('screen/act')}}">
                    Mã đã nhận
                    </a>
                    </span>


            </div>

  </div>
  <div class="content-body content-wrapper">


      <?php $col = 0; ?>

      <?php foreach( $redeems as $re): ?>
      <?php if($col == 0) : ?>
        <div class="row">

       <?php endif; ?>
       <div class="pull-left" style="width:48%;margin:1%">
        <div class="card"  >

          <div class="card-block">
              <img src="{{$re->img}}" class="card-img img-fluid mb-1">
              <h6 ><strong> {{$re->title}} </strong></h6>


          </div>


        </div>
          </div>
  <?php if($col == 1) : ?>

   </div>
  <?php
      $col = 0 ;
    else :
      $col ++;
    endif; ?>
<?php endforeach; ?>


  </div>

  <div class="card-footer">
      {{ $query->render() }}
  </div>

</div>

@endsection
