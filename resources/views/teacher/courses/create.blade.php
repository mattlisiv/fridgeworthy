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
            <div class="listtabletitle">Create Class</div>

            <div style="height:400px">
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                        <br>
                        {!! Form::open(['url'=>'store_course']) !!}
                        <div>
                            <h6>{!! Form::label('Name', 'Class name:',['style'=>'margin:25px 0px']) !!}</h6>
                            <br>
                            <h6>{!! Form::text('name',old('name'),['style'=>'text-align:center']) !!}</h6>
                        </div>
                        <br>
                        <div>
                            <h6>{!! Form::label('description', 'Give a description of the course:',null) !!}</h6>
                            <br>
                            <p>This description will be displayed to help students identify your specific class.</p>
                            <br>
                            <br>
                            <div style="width: 70%;margin:0 auto">
                            {!! Form::textarea('description',old('description'),['style'=>'margin: 0 auto;width:100%']) !!}
                            </div>
                        </div>
                        <br>
                        {!! Form::submit('Create Class',['class'=>'classdetbtn']) !!}
                        {!! Form::close()!!}
                    <br>
                    @if($errors)
                        <div style="color:red;margin: 0 auto;text-align: center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
