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
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/pages.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/retina.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.stepframemodal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fridgeworthy.js')}}"></script>

    @include('home.partials.favico')
</head>

<body class="indexbg" ontouchstart="">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="mainwrap">

    @include('home.partials.sections.Home')

    @include('home.partials.modal.Login')

    @include('navigation.homemasternav')

    @include('home.partials.modal.Logout')

    @include('home.partials.sections.About')

    @include('home.partials.sections.Rewards')

    @if(is_null($user))
        @include('home.partials.sections.RegistrationOpen')
    @else
        @include('home.partials.sections.Account')
        @include('home.partials.sections.UserProfile')
    @endif


    <div class="push"></div>
</div><!--end mainwrap-->

@include('home.partials.Footer')

@include('home.js.homejs')
</body>
</html>
