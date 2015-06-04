<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridge-worthy.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    @include('js.maincssandjs')
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

    @if(is_null($user))
        @include('home.partials.sections.About')
    @endif

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
