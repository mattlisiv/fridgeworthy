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

    @include('home.partials.modal.Login')


    <!--start list template-->
    <section id="listtemplatecnt">
        <div class="listtable">
            <div class="listtabletitle">We see you already have a FridgeWorthy account</div>

            <div>
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    {!! Form::open(['url'=>'parent_confirmation_additional']) !!}
                    <div>

                        <br>
                        <br>
                        <h6>Email: <br><span style="font-weight: bolder">{{$student->parent_email}}</span></h6>
                        <br>
                        <br>
                        <h5>Complete the information below</h5>
                        <br>
                        <br>
                        <a href="{{action("HomeController@TermsAndConditions")}}" target="__blank" class="plinkwhite">Terms and Conditions</a>

                        <h6>{!! Form::checkbox('authorization','checked',false,['style'=>'padding-bottom:50px;padding-left:10px']) !!}
                            {!! Form::label('checkDescription', 'By checking this box, I am verifying I am the parent/guardian of '.$student->full_name.', and I have read through the Terms and Conditions above.') !!}</h6>
                        <br>

                    </div>
                    <br>
                    <br>
                    <br>
                    @if($errors)
                        <div style="color:red;margin: 0 auto;text-align: center;color:red">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <br>
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <br>
                            <br>
                        </div>
                    @endif
                    {!! Form::hidden('registration_id',$registration_id)!!}
                    {!! Form::hidden('email',$student->parent_email)!!}
                    {!! Form::submit('Confirm Student',['class'=>'classdetbtn']) !!}
                    {!! Form::close()!!}
                </div>
            </div>
        </div>

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
