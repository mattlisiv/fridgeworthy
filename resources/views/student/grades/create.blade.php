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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

</head>

<body class="innerbg" ontouchstart="">

<div class="mainwrap">

    @include('navigation.masternav')

    @include('home.partials.modal.Logout')


    <!--start list template-->
    <section id="listtemplatecnt">
        <div class="listtable">
            <div class="listtabletitle">Submit Grade</div>

            <div style="height:350px">
                <div style="color: #808080;font-size:16px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    <br>
                    {!! Form::open(['url'=>'store_grade']) !!}
                    <div>
                        <br>
                        <h6>You are submitting a grade for assignment <span style="font-weight: bold">{{$assignment->name}}</span>.</h6>
                        <br>
                        <br>
                        <br>
                        <h6>{!! Form::label('Name', 'Numeric Grade:',['style'=>'margin:25px 0px;']) !!}</h6>
                        <br>
                        <h6>{!! Form::text('numeric_grade',null,['style'=>'text-align:center;']) !!}</h6>
                        <br>
                        {!! Form::hidden('assignment_id',$assignment->id) !!}
                    </div>
                    <br>
                    <br>
                    {!! Form::submit('Submit',['class'=>'classdetbtn']) !!}
                    {!! Form::close()!!}
                </div>
            </div>


</div><!--end list table-->
    </section><!--end list template-->



<div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->


@include('home.partials.Footer')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
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
