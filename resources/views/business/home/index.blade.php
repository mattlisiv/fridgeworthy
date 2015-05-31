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
    <div id="couplplogo"><a href="{{action('HomeController@index')}}"><img src="{{asset('images/fwlogo-clp.png')}}" alt="FridgeWorthy logo"></a></div>


    {!! Form::open(['url'=>'submit_access_code','id'=>'codeform']) !!}
    <div>
        <br>
        <h6>{!! Form::select('reward_id',array('default'=>'Select Reward') +$business->rewards->lists('name','id'),
            'default',['class'=>'customSelect']) !!}</h6>
        <br>
        <br>
        <h6>{!! Form::text('access_code',null,['placeholder'=>'enter access code','class'=>'tfield']) !!}</h6>
        <br>
    </div>
    {!! Form::button('Submit',['type'=>'submit']) !!}
    {!! Form::close()!!}
    <br>
    <br>
    @if($errors)
        <div style="color:red;margin: 0 auto;text-align: center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    <br>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="redempstats">
        <h1>rewards statistics<br> for<br> {{$business->name}}</h1>
        <div class="redempbox" id="redbox"><h2>{{count($business->rewards)}}</h2><p>rewards</p></div>
        <div class="redempbox" id="queuebox"><h2>{{count($business->coupons)}}</h2><p>coupons</p></div>
        <div class="redempbox" id="circbox"><h2>{{count($business->coupons()->redeemed()->get())}}</h2><p>coupons redeemed</p></div>
        <div class="redempbox" id="cancbox"><h2>{{count($customers)}}</h2><p>customers</p></div>
    </div>

</div><!--endcouponlpwrap-->
</body>
</html>
