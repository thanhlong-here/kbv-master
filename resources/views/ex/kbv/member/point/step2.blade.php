

<form class="form" action="{{url('screen/member/point')}}" method="post">

  <div class="col-xs-1"></div>
  <div class="col-xs-10">
    <input type="hidden" name="mem_id" value="{{$mem_id}}">
    <input type="hidden" name="step" value="3">
    <input type="hidden" name="redeem_xu" value="{{$redeem_xu}}">

    <fieldset class="form-group">
        <select class="form-control shadow" id="basicSelect" name="bank_name">
            <option value="Agribank">Agribank</option>
            <option value="Vietcombank">Vietcombank</option>

            <option value="Techcombank">Techcombank</option>
            <option value="Sacombank">Thương Mại Cổ Phần Sài Gòn Thương Tín Sacombank</option>
            <option value="ACB">ACB</option>
            <option value="MB-Bank">Quân Đội MB</option>
            <option value="VietinBank">VietinBank</option>

            
        </select>
    </fieldset>
    <fieldset class="form-group form-group-xl">
        <input class="form-control shadow"
        placeholder="Số Tài Khoản"
        value="" type="text" name="bank_number" required='true'>
    </fieldset>
    <fieldset class="form-group form-group-xl" style="margin-bottom: 20px">
        <input class="form-control shadow" value=""
        placeholder="Chủ Tài Khoản"
        type="text" name="user_name" required='true'>
    </fieldset>
    </div>
    <a href="{{url('screen/history-xu')}}" class="btn  btn-min-width mr-1 mb-1">
      <i class="fa fa-long-arrow-left"></i> Hủy</a>
    <button class="btn btn-next btn-min-width mr-1 mb-1">Bước tiếp theo <i class="fa fa-long-arrow-right"></i></button>

  </form>
