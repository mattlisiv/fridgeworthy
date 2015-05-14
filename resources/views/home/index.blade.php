<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>FridgeWorthy Rewards | Home</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <!--CSS links-->

    <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/pages.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/waypoints.min.js"></script>
    <script type="text/javascript" src="/js/waypoints.sticky.js"></script>
    <script type="text/javascript" src="/js/parallax.js"></script>
    <script type="text/javascript" src="/js/retina.min.js"></script>
    <script type="text/javascript" src="/js/jquery.stepframemodal.js"></script>
    <script type="text/javascript" src="/js/fridgeworthy.js"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>

<body class="indexbg" ontouchstart="">

<div class="mainwrap">

    @include('home.partials.sections.Home')

    @include('home.partials.modal.Login')

    @include('home.partials.StickyNavigation')

    @include('home.partials.modal.Logout')

    @include('home.partials.sections.About')

    @include('home.partials.sections.Rewards')


    @if(is_null($user))
        @include('home.partials.sections.RegistrationOpen')
    @elseif(get_class($user)=='App\Student' || get_class($user)=='App\Teacher' || get_class($user)== 'App\Parent')
        @include('home.partials.sections.UserProfile')
    @elseif(get_class($user)=='App\BusinessManager')
        @include('home.partials.sections.BusinessManager')
    @endif


    <div class="push"></div>
</div><!--end mainwrap-->


    @include('home.partials.Footer')

    @include('home.js.homejs')
</body>
</html>
