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
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/coupon-lp.css" rel="stylesheet" type="text/css" media="screen">


    <!--JS links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/retina.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.stepframemodal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fridgeworthy.js')}}"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
</head>

<body ontouchstart="">


<div class="couponlpwrap">

    <div id="redempstats">
        <h1>Thank you, this reward has been updated to redeemed.</h1>


        <a href="{{action('HomeController@index')}}"><button>Home</button></a>
        <br>
        <br>
        <a href="{{action('Business\HomeController@index')}}"><button>Back</button></a>
        <br>


    </div>

</div><!--endcouponlpwrap-->
</body>
</html>
