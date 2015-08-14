<!DOCTYPE HTML>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridge-worthy.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    @include('js.maincssandjs')

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

@include('socialmedia.google-tag-manager')


<div class="mainwrap">

    @include('navigation.masternav')

    @include('home.partials.modal.Logout')

    <!--start points system teacher-->
    <section class="pointssystemcnt">
        <h1 class="whitedkgray">how do you earn points?</h1>
        <h2>earn points for uploading and verifying class materials!</h2>

        <div class="teacherpointscol" id="testteachpts">
            <div class="psteachheadorange"><h2>tests</h2></div>
            <div class="teachpointsbox">
                <div class="teachpointvalorange"><h1>5</h1><h6 class="orange">points</h6></div>
                <div class="peruploadtxt"><h5>per upload<br> & verification</h5></div>
            </div>
        </div>

        <div class="teacherpointscol" id="quizteachpts">
            <div class="psteachheadgreen"><h2>quizzes</h2></div>
            <div class="teachpointsbox">
                <div class="teachpointvalgreen"><h1>3</h1><h6 class="green">points</h6></div>
                <div class="peruploadtxt"><h5>per upload<br> & verification</h5></div>
            </div>
        </div>

        <div class="teacherpointscol" id="assignteachpts">
            <div class="psteachheadblue"><h2>assignments</h2></div>
            <div class="teachpointsbox">
                <div class="teachpointvalblue"><h1>1</h1><h6 class="blue">point</h6></div>
                <div class="peruploadtxt"><h5>per upload<br> & verification</h5></div>
            </div>
        </div>

        <div class="teacherpointscol" id="studyteachpts">
            <div class="psteachheadpink"><h2>study materials</h2></div>
            <div class="teachpointsbox">
                <div class="teachpointvalpink"><h1>3</h1><h6 class="pink">points</h6></div>
                <div class="peruploadtxt"><h5>per upload</h5></div>
            </div>
        </div>




        <div class="clear"></div>
    </section><!--end points system teacher-->


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
