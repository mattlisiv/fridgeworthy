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

<body class="innerbg" ontouchstart="">

<div class="mainwrap">



    @include('navigation.masternav')


    @include('home.partials.modal.Logout')

    <!--start list template-->
    <section id="listtemplatecnt">

            <div class="listtable">
                <div class="listtabletitle">Get Involved Today!</div>

                        <br>
                        <br>
                        <h5>At FridgeWorthy, we want to know what the hardworking parents think,
                            because we know how important you are to educational success.</h5>
                        <br>
                        <br>
                        <br>
                        <h6>Take some time to  write us your thoughts and suggestions below, so we
                        can make our service better for you and your student.</h6>

                {!! Form::open(['url'=>'store_suggestion']) !!}
                <div>
                    <br>
                    <br>

                    <br>
                    <h6>{!! Form::textarea('suggestion',null,['style'=>'font:large']) !!}</h6>
                    <br>
                    <h5>{!! Form::submit('Submit',['class'=>'classdetbtn','style'=>'width:75%']) !!}</h5>
                    {!! Form::close()!!}
                </div>
                <br>
                <br>



                <br>
            </div><!--end list table-->

        <br>
        <a href="{{action('HomeController@index')}}"><button class="managebtn">Back Home</button></a>
    </section><!--end list template-->


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
