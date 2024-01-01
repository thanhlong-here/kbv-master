
<form class="form" action="{{url('screen/member/point')}}" method="post" id="formSharedFacebook">

    <input type="hidden" name="mem_id" value="{{$mem_id}}">
    <input type="hidden" name="step" value="4">
    <input type="hidden" id="description" value="anh {{$mem->name}} đã đổi thành công 200 xu thành 200.000vnd qua ứng dung KB Member">
    <input type="hidden" name="redeem_xu" value="{{$redeem_xu}}">
    <input type="hidden" name="bank_name" value="{{$bank_name}}">
    <input type="hidden" name="bank_number" value="{{$bank_number}}">
    <input type="hidden" name="user_name" value="{{$user_name}}">

    <div class="point_avatar" style="background">
        <!-- <img src="/images/avatar/page3.png" class="avatar"> -->
        <div class="image_box">
          <p style="margin-top:1rem">
          Anh/Chị <strong>{{$mem->name}}</strong> đã đổi thành công {{$redeem_xu}} xu thành {{$redeem_xu}}.000vnd qua ứng dung <strong>KB Member</strong>
        </p>
        </div>
    </div>
    <br>
    <a href="{{url('screen/history-xu')}}" class="btn  btn-min-width mr-1 mb-1">
      <i class="fa fa-long-arrow-left"></i> Hủy</a>
    <button class="btn btn-next btn-min-width mr-1 mb-1" type="button" onclick="fbs_click()" id="btnShare">Share Facebook <i class="fa fa-long-arrow-right"></i></button>

</form>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=2929879953695443&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    function fbs_click() {
         FB.ui({
            method: "feed",
             link:  "https://www.facebook.com/kbvisionvietnam",
             name: "",
             caption: '',
             description: $("#description").val()
         }, function(t) {
             var str = JSON.stringify(t);
             var obj = JSON.parse(str);
             if (obj.post_id != '') {
                 $("#formSharedFacebook").submit();
             }
         });
        //window.open('https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/kbvisionvietnam/', 'fbShareWindow', 'toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
        //$("#formSharedFacebook").submit();
        return false;
    }
</script>
@section('footer_scripts')
<script>
</script>
@stop
