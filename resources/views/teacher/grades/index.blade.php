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
        <br>
        <br>
        <div class="listtable">
            <div class="listtabletitle">Grade Book</div>
            @if(count($assignments))
                <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">
                    <br>

                        <h6>
                            <span  class="custom-dropdownBlue">
                             {!! Form::select('assignment_id',$assignments->lists('name','id'),$assignments->first()->name,['class'=>'customSelect','style'=>'float:right','id'=>'assignment-selector']) !!}
                        </span>
                        </h6>

                    <br>
                </div>
                @foreach($assignments as $assignment)
                    @if(count($assignment->grades()->get()))
                    @foreach($assignment->grades()->get() as $grade)
                            <div style="display: none" id="assgn-{{$assignment->id}}-div" class="listtablerow assignment-view">
                                <div style="width: 33%" class="listitemname"><p class="white">{{$grade->student->full_name}}</p></div>
                                <div style="width: 33%" class="listitemname" ><p class="white">{{$grade->status}}</p></div>
                                <div class="listviewbutton">
                                        <a href="{{action('AssignmentManagerController@editGrade',$grade->id)}}"><button type="button" value="view" class="smbtn">{{$grade->numeric_grade}}</button></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                            <div style="display: none;" id="assgn-{{$assignment->id}}-div" class="listtablerow assignment-view">
                                    <div class="listitemname"><p class="white">No current grades.</p></div>
                                </div>
                    @endif
                    @endforeach

            @else
                <div class="listtablerow">
                    <div class="listitemname"><p class="white">No current assignments.</p></div>
                </div>
            @endif
            <br>
        </div><!--end list table-->
        <br>
        <br>
        <a href="{{action('CourseManagerController@viewCourse',$course->id)}}"><button class="managebtn">View Course</button></a>

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
        @if($assignments->first())
        var first_id = {{$assignments->first()->id}};
        $('#assgn-'+first_id+'-div').show();
        @endif



        $("#assignment-selector").change(function(){

            $(".assignment-view").hide();
            var val = $("#assignment-selector").val();
            $("#assgn-"+val+"-div").show();

        });
    });

    function changeAssignment(){


    }
</script>
</body>
</html>
