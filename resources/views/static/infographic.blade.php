<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FridgeWorthy Infographic</title>
    <link href="/css/infographic.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />


    <link href="/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/css/responsive.css" rel="stylesheet" type="text/css">

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

<body>

<!--start login-->
@include('home.partials.modal.login')

@include('home.partials.StickyNavigation')

<div id="headerwrapper">
    <div id="title">

        <img src="images/infographic-dektop-h-1.svg" alt="How Hard Work Pays Off">
        <div id="stars">
            <img src="images/infographic-dektop-h-2.svg" alt="stars">
        </div>
    </div>


    <div id="infographic-h">
        <img src="images/infographic-dektop-h-3.svg" alt="infographic">
        <!--footer-->
       @include('home.partials.Footer')
    </div>

    <div id="infographic-v">
        <img src="images/infographic-dektop-v-3.svg" alt="infographic">
        @include('home.partials.Footer')
    </div>
</div>
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
