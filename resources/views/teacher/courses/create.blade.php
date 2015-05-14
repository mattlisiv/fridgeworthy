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
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/pages.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">

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


    <!--start list template-->
    <section id="listtemplatecnt">
        <div class="listtable">
            <div class="listtabletitle">Create Class</div>

            <div style="height:400px">
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                        <br>
                        {!! Form::open(['url'=>'store_course']) !!}
                        <div>
                            <h6>{!! Form::label('Name', 'Class name:',['style'=>'margin:25px 0px']) !!}</h6>
                            <br>
                            <h6>{!! Form::text('name',null,['style'=>'padding:10px']) !!}</h6>
                        </div>
                            <br>
                        <div>
                            <h6>{!! Form::label('description', 'Give a description of the course:',['style'=>'margin:25px 0px']) !!}</h6>
                            <br>
                            <h6>{!! Form::textarea('description',null,['style'=>'padding:10px']) !!}</h6>
                        </div>
                            <br>
                        {!! Form::submit('Create Class',['class'=>'classdetbtn']) !!}
                        {!! Form::close()!!}
                        </div>
                </form>
                </div>
            </div>

        </div><!--end list table-->
    </section><!--end list template-->



    <div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->


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
