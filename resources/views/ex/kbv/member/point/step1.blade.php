
<div class="point_avatar" style="margin-top:-20%;margin-bottom:0">
    <img src="/images/avatar/page1.png" class="avatar">
</div>

<form class="form" action="{{url('screen/member/point')}}" method="post">

    <input type="hidden" name="mem_id" value="{{$mem_id}}">
    <input type="hidden" name="step" value="2">
    <div class="card-block">
      <div class="col-xs-1"></div>
      <div class="col-xs-10">
        <div class="point_input_box  text-center">


            <p class="point_title">Chọn số lượng xu đổi</p>
            <select class="point_input" name="redeem_xu"
              style="text-align: center;text-align-last: center;background: #fff;"
            >

              <?php for( $i=200;$i<1001;$i+=100 ){ ?>
                <option

                value="<?php echo $i; ?>"><?php echo $i; ?>  </option>

              <?php } ?>
            </select>

        </div>
      </div>
    </div>
<div>
    <p style="margin-bottom: 30px;">*Lưu ý: Giới hạn sổ lượng xu quy đổi mỗi lượt từ 200 - 1000 xu</p>
    <a href="{{url('screen/history-xu')}}" class="btn  btn-min-width mr-1 mb-1">
      <i class="fa fa-long-arrow-left"></i> Quay lại</a>
    <button type="submit" class="btn btn-next btn-min-width mr-1 mb-1">
      Bước tiếp theo <i class="fa fa-long-arrow-right"></i></button>
</div>
</form>
