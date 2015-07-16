<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>FridgeWorthy | Hard Work Pays Off</title>
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

    @if(!is_null($user) && get_class($user)=='App\BusinessManager')
        @include('home.partials.sections.BusinessManager')
    @endif
    @include('home.partials.sections.Rewards')

    @if(is_null($user))
        @if(!is_null($registration) && $registration->value=='open')
        @include('home.partials.sections.RegistrationOpen')
        @else
            @include('home.partials.sections.RegistrationClosed')
        @endif
    @else
        @include('home.partials.sections.Account')
        @include('home.partials.sections.UserProfile')
    @endif


    <div class="push"></div>
</div><!--end mainwrap-->

@include('home.partials.Footer')

@include('home.js.homejs')

<!--scrolling logos-->
<script>
    $(function () {
        $('#buslogoscroll').scrollbox({
            linear: true,
            step: 1,
            delay: 0,
            speed: 40,
            onMouseOverPause: false
        });
    });

    var firstItem = Math.floor(Math.random() * (11 - 1)) + 1;
    $('#sbox ul li').each(function(idx,cnt){
        if(idx>=firstItem){
            $(this).appendTo($('#buslogoscroll ul'));
        }
    });
    $('#sbox ul li').each(function(idx,cnt){
        if(idx<firstItem){
            $(this).appendTo($('#buslogoscroll ul'));
        }
    });
</script>
</body>
</html>
