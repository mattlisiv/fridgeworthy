<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridge-worthy.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <!--CSS links-->
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/coupon-screen.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('css/coupon-print.css')}}" rel="stylesheet" type="text/css" media="print">

    <!--JS links-->
    <script type="text/javascript" src="js/retina.min.js"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>

<body ontouchstart="">

<div class="couponwrap">
    <h2><a href="{{action('HomeController@index')}}">HOME</a> | <a href="{{action('PublicRewardController@viewMyUnredeemedRewards')}}">MY REWARDS</a> | <a href="javascript:window.print()">PRINT REWARD</a></h2>
    <br>
    <br>
    <div class="offerbox">
        <div class="offerstroke">
            <div class="offerlogo"><img src="{{$reward->getFilePath()}}" alt="FridgeWorthy logo"></div>
            <h1>{{$reward->name}}<span>*</span></h1>
            <h3>*redeemable only at @if(!is_null($reward->business->location) && $reward->business->location!='')<span style="font-weight: bolder">{{$reward->business->location}}</span> or other @endif participating locations <br>
                *valid only for single transaction <br>
                *no cash value
            </h3>
            <br>
            <h2 style="color:#000088">Access Code: {{$coupon->access_code}}</h2>

            <p>{{$reward->business->name}} | {{$reward->business->website}}<br>
        </div>
    </div>

    <div class="rightcoupwrap">

        <div class="qrbox">
            <div><h2>scan to<br>redeem</h2></div>
            <div class="qr"><img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(1200)->generate($coupon->access_code))}}" alt="qr code"></div>
        </div>

        <div class="couplogobox">
            <h3>courtesy of</h3>
            <img src="/images/fw-logo-300.png" alt="FridgeWorthy logo">
            <h2>hard work pays off.</h2>
            <h4>learn more at <a href="http://www.fridge-worthy.com/" target="_blank">fridge-worthy.com</a></h4>
        </div>

    </div><!--endrightcoupwrap-->

</div><!--endcouponwrap-->
</body>
</html>
