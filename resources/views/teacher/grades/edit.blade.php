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
            @if($grade->status =='accepted')
                <div class="listtabletitle">Grade Details</div>
                <br>
                <br>
                <div style="color: #808080;font-size:16px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                <h5><span style="color: white;font-weight: bold">{{$grade->student->full_name}}</span> has received a
                    <span style="color: white;font-weight: bold">{{$grade->numeric_grade}}</span> on
                    the assignment {{$grade->assignment->name}}.
                </h5>
                <br>
                </div>
            @else
            <div class="listtabletitle">Confirm Grade</div>

            <div >
                <div style="color: #808080;font-size:16px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>
                    <br>
                    {!! Form::open(['url'=>'update_grade']) !!}
                    <div>

                    </div>
                    <br>
                    <div>
                        <h6 id="confirmation-statement">{{$grade->student->full_name}} has submitted a grade of
                            <span style="color:white;font-weight: bold">{{$grade->numeric_grade}}</span>
                            for
                            <span style="color: white;font-weight: bold">{{$grade->assignment->name}}</span>.
                        </h6>
                        <h6 style="display: none" id="confirmation-question">Confirm {{$grade->student->full_name}} has received a grade of
                            <span style="color:white;font-weight: bold">{{$grade->numeric_grade}}</span>
                            for
                            <span style="color: white;font-weight: bold">{{$grade->assignment->name}}</span>?
                        </h6>
                        <h6 style="display: none" id="edit-statement">Please edit {{$grade->student->full_name}}'s  grade for
                            <span style="color:white;font-weight: bold">{{$grade->assignment->name}}</span>.

                        </h6>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div id="confirmation" style="display:none">
                    <div id="edit-grade" style="display: none">
                        <h6>{!!Form::label('revised_grade','Enter in revised grade')!!}</h6>
                        <h6>{!!Form::text('revised_grade',null,['style'=>'text-align:center'])!!}</h6>
                    </div>
                    <br>
                    {!!Form::hidden('grade_id',$grade->id)!!}
                    {!!Form::hidden('action','confirm',['id'=>'action'])!!}
                    <br>
                    <br>
                    <br>
                    {!! Form::submit('Update',['class'=>'classdetbtn','id'=>'submit-grade']) !!}
                    {!! Form::close()!!}
                    <br>
                     </div>
                    <div id="question">
                        <h5>Would you like to edit or confirm this grade?</h5>
                        <br>
                        <button id="edit" class="classdetbtn">Edit</button>
                        <br>
                        <br>
                        <button id="confirm" class="classdetbtn">Confirm</button>
                    </div>
            </div>
            @endif
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

        $("#confirm").click(function(){

            $("#confirmation-statement").hide();
            $("#confirmation-question").show();
            $("#submit-grade").val("Confirm");
            $("#confirmation").show();
            $("#question").hide();
        });

        $("#edit").click(function(){

            $("#submit-grade").val("Edit and Confirm");
            $("#confirmation-statement").hide();
            $("#confirmation").show();
            $("#edit-statement").show();
            $("#edit-grade").show();
            $("#question").hide();
            $("#action").val("edit");
        });
    });
</script>
</body>
</html>
