<html lang="vi">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<body style="font-family:Arial, sans-serif;font-size:1rem">
<div style="margin-top:30%;text-align:center">
  <h3 style="color:blue">{{$product->PRODUCT_NAME}}</h3>

  <p>SeriNo: <strong style="font-size:1.5rem" >{{$seri}}</strong>  </p>

  <p style="margin-top:2rem;font-size:1.12rem">
    Thưởng : <strong style="color:blue;" > + {{$redeem->points}} </strong>(điểm)</p>

  <a href="<?php echo url("screen/reward?redeem=".$redeem->id."&seri=".$seri) ?>"
    style="text-decoration:none;"
    >
  <span style="vertical-align: middle;
        text-align: center;line-height: 1.25;border-radius: 0.25rem;
        border-color: #10C888 !important;
        background-color: #16D39A !important;

        padding: 0.75rem 1rem;
        color: #FFFFFF;">
            Nhận Thưởng
  </span>
  </a>

</div>
</body>

</html>
