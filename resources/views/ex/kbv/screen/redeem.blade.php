@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper bg_redeem_top" style="background-image: url('{{url("images/bg_top.jpg")}}');">

  <div class="content-header row text-xs-center">



          <div class="tabs" >
            <span class="first ati">
            Phần thưởng</span>
  <span class="end tab">
                  <a href="{{url('screen/act')}}">
                    Mã đã nhận
                    </a>
                    </span>


            </div>

  </div>


  <div class="content-body content-wrapper "
      style="margin-top:10%;height:100%;background-image: url('../images/bg_bottom.jpg');
      background-position: bottom;
      background-repeat: no-repeat;
      background-size: contain;"
  >


      <?php $col = 0; ?>

      <?php foreach( $redeems as $re): ?>
      <?php if($col == 0) : ?>
        <div class="row">

       <?php endif; ?>
       <div class="pull-left" style="width:46%;margin:2%">
        <div class="card conner"  >

          <div class="card-block text-xs-center">
              <img src="{{$re->img}}" class="card-img redeem_img mb-1">
              <div class="row bg-blue white  redeem_title">
                  <strong> {{$re->title}} </strong>
              </div>
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

<div class="pag">
{{ $query->render() }}
</div>
  </div>



</div>




@endsection
