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
            <div class="listtabletitle">Change Password</div>

            <div>
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    {!! Form::open(['url'=>'update_password']) !!}
                    <div>
                        <br>
                        <h6>{!! Form::label('password', 'Enter current password',['style'=>'margin:25px 0px']) !!}</h6>
                        <br>
                        <h6>{!! Form::password('password',null,['style'=>'padding:10px;text-align:center']) !!}</h6>
                    </div>
                    <br>
                    <br>
                    <div>
                        <h6>{!! Form::label('newpassword', 'Enter new password',['style'=>'margin:25px 0px']) !!}</h6>
                        <br>
                        <h6>{!! Form::password('newpassword',null,['style'=>'padding:10px;text-align:center']) !!}</h6>
                    </div>
                    <div>
                    <br>
                    <br>
                        <h6>{!! Form::label('newpassword_confirmation', 'Confirm new password',['style'=>'margin:25px 0px;text-align:center']) !!}</h6>
                        <br>
                        <h6>{!! Form::password('newpassword_confirmation',null,['style'=>'padding:10px;text-align:center']) !!}</h6>
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
                    {!! Form::submit('Update',['class'=>'classdetbtn']) !!}
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
