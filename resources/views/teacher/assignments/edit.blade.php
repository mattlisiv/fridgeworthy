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
            <div class="listtabletitle">Edit Assignment For {{$assignment->name}}</div>

            <div style="height:550px">
                <div style="color: #808080;font-size:16px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    <br>
                    {!! Form::open(['url'=>'update_assignment']) !!}
                    <div>
                        <h6>{!! Form::label('Name', 'Assignment name:',['style'=>'margin:25px 0px']) !!}</h6>
                        <br>
                        <h6>{!! Form::text('name',$assignment->name,['style'=>'text-align:center']) !!}</h6>
                    </div>
                    <br>
                    <div>
                        <h6>{!! Form::label('description','Edit Description',['style'=>'margin:25px 0px']) !!}</h6>
                        <br>
                        <div style="width: 70%;margin:0 auto">
                            {!! Form::textarea('description',$assignment->description,['style'=>'margin: 0 auto;width:100%']) !!}
                        </div>
                        {!!Form::hidden('assignment_id',$assignment->id)!!}
                    </div>
                    <div>
                        <br>
                        <h6>{!! Form::label('due_date', 'Select a due date:',['style'=>'margin:25px 0px']) !!}</h6>
                        <br>
                        <h6>{!! Form::text('due_date', $assignment->due_date->format('m/d/Y'), array('id' => 'datepicker','style'=>'text-align:center')) !!}</h6>
                    </div>
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
                    <br>
                    {!! Form::submit('Update',['class'=>'classdetbtn']) !!}
                    {!! Form::close()!!}
                </div>
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
