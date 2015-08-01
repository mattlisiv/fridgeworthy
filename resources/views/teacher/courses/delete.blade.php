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


    <!--start list templaOte-->
    <section id="listtemplatecnt">
        <div class="listtable">
            <div class="listtabletitle">Delete A Class</div>
            <br>



            <div style="color: #ffffff;font-size:14px;font-family: 'ralewaylight', Helvetica, sans-serif;width:75%;margin: 0 auto">

                <div id="delete" style="display:none">
                    {!! Form::open(['url'=>'destroy_course']) !!}
                    <div>
                        <br>
                        <h6>Are you sure you would like to delete this class?
                            <br>
                            By deleting this class, all associated assignments and grades will also be deleted.
                        </h6>
                        <br>
                    </div>
                    {!! Form::submit('Yes, Delete',['class'=>'classdetbtn','style'=>'border-color:#13cf56;background-color:#13cf56']) !!}
                    <br>

                </div>
                <div id="deleteDisplay">
                    <br>
                    <h6>By deleting a class, you will be removing all associated assignments and grades.</h6>
                    <br>
                    <h5>Select Class</h5>
                    <br>
                    <h6>{!! Form::select('course_id',array('default'=>'Please Select ') +$courses->lists('name','id'), 'default',
                        ['class'=>'customSelect','style'=>'text-indent:10px']) !!}</h6>
                    <br>
                    <br>
                    {!! Form::close()!!}
                    <button class="classdetbtn" onclick="displayDelete()">Delete Class</button>
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
                    <br>
                </div>
                <button id="no_button" style="border-color: red;background-color: red;display:none" class="classdetbtn" onclick="hideDelete()">No</button>

                <script type="text/javascript">

                    function displayDelete(){

                        $("#deleteDisplay").hide();
                        $("#delete").show();
                        $("#no_button").show();
                    }

                    function hideDelete(){

                        $("#delete").hide();
                        $("#deleteDisplay").show();
                        $("#no_button").hide();

                    }

                </script>

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
