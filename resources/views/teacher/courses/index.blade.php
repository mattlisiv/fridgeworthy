<!DOCTYPE HTML>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridge-worthy.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <!--CSS links-->
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/pages.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
    <link href="css/clndr.css" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/waypoints.sticky.js"></script>
    <script type="text/javascript" src="js/retina.min.js"></script>
    <script type="text/javascript" src="js/jquery.stepframemodal.js"></script>
    <script type="text/javascript" src="js/fridgeworthy.js"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body class="innerbg" ontouchstart="">

<div class="mainwrap">


    @include('navigation.masternav')

    @include('home.partials.modal.Logout')


    <!--start my classes content-->
    <section id="myclassespancnt">
        <h1 class="whitedkgray">my classes</h1>

        <div class="classescol1">
            <div class="classlisttable" id="classlist">
                <div class="classlisttabletitle">class list</div>
                @if(count($courses))
                    @foreach($courses as $course)
                        <div class="classlisttablerow"><p><a class="plinkwhite" href="{{action('CourseManagerController@viewCourse',$course->id)}}">{{$course->name}}</a></p></div>
                    @endforeach
                @else
                    <div class="classlisttablerow"><p>No current classes.</p></div>
                @endif
            </div>


            <div class="classlisttable viewupcomingassign">
                <div class="classlisttabletitle">upcoming assignments</div>
                @if(count($assignments))
                    @for($i = 0; $i<3 || $i > count($assignments); $i++)
                        <div class="classlisttablerow"><p><a href="{{action('AssignmentManagerController@viewAssignment',$assignments[$i]->id)}}" class="plinkwhite">{{$assignments[$i]->name}}</a></p></div>
                    @endfor
                @else
                    <div class="classlisttablerow"><p>No current Assignments</p></div>
                @endif
            </div>
        </div><!--end col1-->

        <div class="classescol2">
            <div class="rcrimg" id="mainclassimg"></div>

            <div id="calendar" class="container">
                <div class="cal1"></div>
            </div>

        </div><!--end col2-->

        <div class="clear"></div><!--clear cols-->
    </section><!--end my classes content-->


    <div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->
<footer>
    <div class="footercnt">
        <ul>
            <li class="footertxt">Copyright © 2015 FridgeWorthy, LLC</li>
            <li class="footertxt"><a href="#">Privacy Policy</a></li>
            <li class="footertxt"><span>phone:</span>  <a href="tel:404-444-8551">404-444-8551</a></li>
            <li class="footertxt"><span>email:</span>  <a href="mailto:support@fridge-worthy.com">support@fridge-worthy.com</a></li>
        </ul>
    </div>
</footer>
<!--end footer-->

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

<!-- calendar -->
<script src="js/json2.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src= "js/moment-2.8.3.js"></script>
<script src="js/clndr.js"></script>
<script src="js/clndr-site.js"></script>

</body>
</html>
