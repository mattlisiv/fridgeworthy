<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>FridgeWorthy Rewards | Home</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <!--CSS links-->
    <link href="{{asset('css/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/pages.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/waypoints.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/retina.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.stepframemodal.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/fridgeworthy.js')}}"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
</head>

<body class="indexbg" ontouchstart="">

<div class="mainwrap">


    @include('home.partials.sections.Home')

    @include('home.partials.modal.Login')

    @include('integration.navigation')

    @include('home.partials.modal.Logout')

    @include('home.partials.sections.About')


    <!--rewards-->
    <section id="rewardspanel">
        <div id="rewardspancnt">
            <div class="rewpanhalf">
                <h3 class="white">enter</h3>
                <div id="textwrulesrew">
                    <div class="hrrew"></div>
                    <h4 class="white">the</h4>
                    <div class="hrrew"></div>
                </div><!--end therow-->
                <h1 class="whiteblue">rewards center</h1>
                <div id="mainfindrewbtn"><a href="{{action('PublicRewardController@index')}}">find rewards now!<img src="{{asset('images/whiterightarrow.png')}}" alt="white right arrow"></a></div>
            </div>
            <div class="rewpanhalf">
                <img src="{{asset('images/trophy.svg')}}" alt="trophy">
            </div>
            <div class="clear"></div><!--clear both rewpanhalf-->
        </div><!--end rewardspancnt-->
    </section><!--end reward panel-->

    @if(is_null($user))
        @include('home.partials.sections.RegistrationOpen')
    @elseif(get_class($user)=='App\Student' || get_class($user)=='App\Teacher' || get_class($user)== 'App\Guardian')
        @include('home.partials.sections.Account')
    @elseif(get_class($user)=='App\BusinessManager')
        @include('home.partials.sections.BusinessManager')
    @endif





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

        $(document).ready( function() {

            $('#teachstudselect').bind('change', function (e) {

                if( $('#teachstudselect').val() == '2') {
                    $('#studentspecific').show();
                }
                else if ( $('#teachstudselect').val() == '1'){
                    $('#studentspecific').hide();
                }else{
                    alert('Neither');
                }
            });
        });

        $("#studentscirc").on('mouseenter',function(){

            $("#studentsdescrip").text("Click to learn how students earn great rewards.");

        }).on('mouseleave', function(){

            $("#studentsdescrip").text("Students earn points based on their quality of grades. These points can be redeemed for deals and items from local businesses and organizations.");



        }).on('click', function(){

            window.location.href = "/infographic";

        });

        $("#parentscirc").on('mouseenter',function(){

            $("#parentsdescrip").text("Click to learn how parents can receive updates on their child's progress.")

        }).on('mouseleave', function(){

            $("#parentsdescrip").text("Parents can get involved with their child's progress and receive notifications and status updates.");

        }).on('click', function(){

            window.location.href = "/infographic";

        });

        $("#teacherscirc").on('mouseenter',function(){

            $("#teachersdescrip").text("Click to learn how teachers can help their students achieve success.");

        }).on('mouseleave', function(){

            $("#teachersdescrip").text("Teachers can upload study material and verify students' grades in order to help students suceed academically.");

        }).on('click', function(){

            window.location.href = "/infographic";

        });

        $("#businessescirc").on('mouseenter',function(){

            $("#businessesdescrip").text("Click to learn how businesses can help their local schools.");

        }).on('mouseleave', function(){

            $("#businessesdescrip").text("Businesses, small and large, can gain exposure and customers from contributing to furthering future education.");

        }).on('click', function(){

            window.location.href = "/infographic";

        });

    });
</script>
</body>
</html>
