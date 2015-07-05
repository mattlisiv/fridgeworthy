<!DOCTYPE HTML>
<html><head>
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
    <link href="{{asset('css/infographic.css')}}" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/retina.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.stepframemodal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fridgeworthy.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/modernizr.js')}}"></script>
    <script type="text/javascript">
        if (!Modernizr.svg) {
            var imgs = document.getElementsByTagName('img');
            var svgExtension = /.*\.svg$/
            var l = imgs.length;
            for(var i = 0; i < l; i++) {
                if(imgs[i].src.match(svgExtension)) {
                    imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
                    console.log(imgs[i].src);
                }
            }
        }
    </script>


    @include('home.partials.favico')
</head>

<body class="infographicbg" ontouchstart="">

<div class="mainwrap">

    @include('navigation.masternav')

    @include('home.partials.modal.Logout')

    @include('home.partials.modal.Login')


    <!--start points system student-->
    <section class="pointssystemcnt">
        <h1 class="whitedkgray">how do you earn points?</h1>
        <h2>submit your grades and earn more points the better you do!</h2>

        <div class="studentpointscol" id="teststudpts">
            <div class="psstudheadorange"><h2>test <span>grades</span></h2></div>
            <div class="studpointsbox">
                <div class="psgradeorange"><h1>A</h1></div>
                <div class="studpointval"><h1>5</h1><h6 class="orange">points</h6></div>
            </div>
            <div class="studpointsbox">
                <div class="psgradeorange"><h1>B</h1></div>
                <div class="studpointval"><h1>3</h1><h6 class="orange">points</h6></div>
            </div>
            <div class="studpointsbox">
                <div class="psgradeorange"><h1>C</h1></div>
                <div class="studpointval"><h1>1</h1><h6 class="orange">point</h6></div>
            </div>
        </div>

        <div class="studentpointscol" id="quizstudpts">
            <div class="psstudheadgreen"><h2>quiz <span>grades</span></h2></div>
            <div class="studpointsbox">
                <div class="psgradegreen"><h1>A</h1></div>
                <div class="studpointval"><h1>3</h1><h6 class="green">points</h6></div>
            </div>
            <div class="studpointsbox">
                <div class="psgradegreen"><h1>B</h1></div>
                <div class="studpointval"><h1>2</h1><h6 class="green">points</h6></div>
            </div>
        </div>

        <div class="studentpointscol" id="assignstudpts">
            <div class="psstudheadblue"><h2>assignment <span>grades</span></h2></div>
            <div class="studpointsbox">
                <div class="psgradeblue"><h1>A</h1></div>
                <div class="studpointval"><h1>1</h1><h6 class="blue">point</h6></div>
            </div>
            <div class="studpointsbox">
                <div class="psgradeblue"><h1>B</h1></div>
                <div class="studpointval"><h1>1</h1><h6 class="blue">point</h6></div>
            </div>
        </div>



        <div class="clear"></div>
    </section><!--end points system student-->


    <div class="push"></div>
</div><!--end mainwrap-->

@include('home.partials.Footer')

<!--responsive menu-->
<script type="text/javascript">
    jQuery(function($){
        $( '.menu-btn' ).click(function(){
            $('.responsive-menu').toggleClass('expand')
        })
    })
</script>
<script>
    jQuery(document).ready(function($){
        $(".menu-item-has-children").append("<div class='open-menu-link open'>+</div>");
        $('.menu-item-has-children').append("<div class='open-menu-link close'>—</div>");
        $('.open').addClass('visible');
        $('.open-menu-link').click(function(e){
            var childMenu =  e.currentTarget.parentNode.children[1];
            if($(childMenu).hasClass('visible')){
                $(childMenu).removeClass("visible");
                $(e.currentTarget.parentNode.children[3]).removeClass("visible");
                $(e.currentTarget.parentNode.children[2]).addClass("visible");
            } else {
                $(childMenu).addClass("visible");
                $(e.currentTarget.parentNode.children[2]).removeClass("visible");
                $(e.currentTarget.parentNode.children[3]).addClass("visible");
            }
        });
    });
</script>
</body>
</html>
