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

<body class="innerbg" ontouchstart="">

<div class="mainwrap">


    @include('navigation.masternav')

    @include('home.partials.modal.Logout')


    <!--start individual class-->
    <section class="indclassespancnt">
        <h1 class="whitedkgray">{{$course->name}}</h1>

        <div class="classescol1">
            <div class="classlisttable viewupcomingassign">
                <div class="classlisttabletitle">Assignments</div>
                @if(count($course->assignments))
                    @foreach($course->assignments as $assignment)
                        <div class="classlisttablerow"><p><a href="{{action('AssignmentManagerController@viewAssignment',$assignment->id)}}" class="plinkwhite">{{$assignment->name}}</a></p></div>
                    @endforeach
                @else
                    <div class="classlisttablerow"><p>No assignments</p></div>

                @endif
            </div>
        </div><!--end col1-->

        <div class="classescol2">
            <div class="classdetbox">
                <form action="#" method="post"><a href="{{action('AssignmentManagerController@viewGrades',$course->id)}}"><button type="button" value="view grades" class="classdetbtn">view grades</button></a></form>
                <div class="rcrimg viewgradesimg"></div>
            </div>
            <div class="classdetbox">
                <form action="#" method="post"><a href="{{action('DocumentManagerController@index',$course->id)}}"><button type="button" value="view study guides" class="classdetbtn">view study materials</button></a></form>
                <div class="rcrimg viewstudyguidesimg"></div>
            </div>
            <div class="classdetbox">
                <form action="#" method="post"><a href="{{action('AssignmentManagerController@submitAssignment',$course->id)}}"><button type="button" value="submit assignment" class="classdetbtn">submit grade</button></a></form>
                <div class="rcrimg createassgnsubgradeimg"></div>
            </div>

        </div><!--end col2-->

        <div class="clear"></div><!--clear cols-->
    </section><!--end individual class-->


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
