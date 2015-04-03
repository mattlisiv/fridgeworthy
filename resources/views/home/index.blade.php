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

    <link href="{{ asset('/css/reset.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/pages.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <!--JS links-->
    <script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/waypoints.min.js"></script>
    <script type="text/javascript" src="/js/waypoints.sticky.js"></script>
    <script type="text/javascript" src="/js/parallax.js"></script>
    <script type="text/javascript" src="/js/retina.min.js"></script>
    <script type="text/javascript" src="/js/jquery.stepframemodal.js"></script>
    <script type="text/javascript" src="/js/fridgeworthy.js"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

</head>

<body class="indexbg" ontouchstart="">

<div class="mainwrap">

    <!--starthome-->
    <section id="home">
        <header>
            <div id="homecnt">
                <div id="homecntblocks">
                    <div id="hardwork">
                        <img src="/images/hardwork@2x.png" alt="Hard work pays off."/>
                    </div>

                    <div id="homeblocks">

                        <div id="logoblock">
                            <img src="/images/fwlogo-main.png" alt="FridgeWorthy Logo" id="logomain"/>
                            <h6>We are here to improve students' learning, educators' teaching, and parents' involvement through rewards and recognition.</h6>

                            <div id="mainlearnbtn"><a href="#aboutpanel" data-scroll="#aboutpanel" class="scrollbtn">learn more<img src="images/whitedownarrow-sm.png" alt="white down arrow"></a></div>
                        </div>

                        <div id="homeformblock">
                            <div id="sublock">
                                <h1 class="whitedkorange">sign up</h1>
                                <h6 class="white">for emails & updates</h6>
                            </div>
                            <div id="liblock">
                                <h1 class="whiteblue">get involved</h1>
                                <h6 class="white">with FridgeWorthy!</h6>
                                <form action="#" method="post" id="loginmain">
                                    <a href="#loginmodal" class="modal-popup"><button type="button" value="login" class="smbtn">login</button></a><br>
                                    <a href="#registrationpanel" data-scroll="#registrationpanel" class="scrollbtn"><button type="button" value="register" class="smbtn">register</button></a>
                                </form>
                            </div>
                        </div>
                    </div><!--end homeblocks-->
                </div>
            </div>
        </header>
    </section>
    <!--endhomecnt-->

    <!--start login-->
    <div id="loginmodal" class="popup">
        <div class="popup-container">
            <div class="popup-content">
                <h5>Login Here</h5>
                <form action="#" method="post">
                    <input type="text" name="username" placeholder="username"/>
                    <input type="text" name="password" placeholder="password"/> <br>
                    <button type="button" value="submit" class="popup-close js-popup-close modal-close smbtnredmodal">cancel</button>
                    <button type="button" name="login_submit" value="submit" class="smbtngreenmodal">submit</button>
                </form>
            </div>
        </div>
    </div>



    <!--start sticky nav-->
    <nav class="my-sticky-element">
        <div class="navlogo"><img src="/images/fwlogo-nav.png" alt="FridgeWorthy logo"></div>

       @include('home.partials.loginBanner')

            <!--main desktop links-->
            <div class="navmainlinks">
                <ul>
                    <li><a href="#home" class="scrollbtn">home</a></li>
                    <li><a href="#aboutpanel" class="scrollbtn">about us</a></li>
                    <li><a href="#rewardspanel" class="scrollbtn">rewards</a>
                        <ul class="dropdownmenu"><li><a href="{{action('PublicRewardController@index')}}" class="scrollbtn">rewards center</a></li></ul>
                    </li>
                    <li><a href="#registrationpanel" class="scrollbtn">registration</a></li>
                </ul>
            </div><!--end menu-header-->

            <div class="mobile-nav">
                <!--hamburger icon-->
                <div class="menu-btn" id="menu-btn">
                    <div></div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!--mobilelinks-->
                <div class="responsive-menu">
                    <div class="menu-header">
                        <ul id="menu-mobile-menu" class="menu">
                            <li class="menu-item"><a href="#home" class="scrollbtn">home</a></li>
                            <li class="menu-item"><a href="#aboutpanel" class="scrollbtn">about us</a></li>
                            <li class="menu-item menu-item-has-children"><a href="#rewardspanel" class="scrollbtn">rewards</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#rewardspanel" class="scrollbtn">rewards center</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#registrationpanel" class="scrollbtn" style="border-bottom: none;">registration</a></li>
                        </ul>
                    </div><!--end menu-header-->
                </div><!--end responsive-menu-->
            </div><!--mobile-nav-->

        </div><!--end right content-->
        <div class="clear"></div><!--clear both cols-->
    </nav><!--end nav-->

    <!--start logout-->
    <div id="logoutmodal" class="popup">
        <div class="popup-container">
            <div class="popup-content">
                <h5>Are you sure you want to logout?</h5>
                <form action="#" method="post">
                    <button type="button" value="no" class="popup-close js-popup-close modal-close smbtnredmodal">no</button>
                    <button type="button" value="yes,logout" class="smbtngreenmodal">yes, logout</button>
                </form>
            </div>
        </div>
    </div>


    <!--start about-->
    <section id="aboutpanel">
        <div id="aboutcnt">
            <h3>We improve students' academic performance</h3>

            <div id="textwrulesabt">
                <div class="hrabt"></div>
                <h4>by showing that</h4>
                <div class="hrabt"></div>
            </div><!--end byrow-->

            <h1 class="orange">hard work pays off.</h1>

            <img src="/images/goldstarrule.svg" align="golden stars">

            <p>At Fridgeworthy, our goal is to incite academic success by rewarding the combined
                efforts of students, teachers, and parents. We know sometimes students need
                motivation to stay focused on their education, especially with so many other
                activities going on in their lives. We are here to remove that pressure from students,
                teachers, and parents. We want to make learning a fun, rewarding, and collaborative
                effort that engages the entire community. With our proud partners, we present exciting rewards that can be redeemed by Fridgeworthy members.</p>

        </div>
        <!--start about 2 div-->
        <div id="aboutpanel2">
            <div id="about2cnt">
                <div class="forthecol" id="studentscol">
                    <div id="studentscirc" ></div>
                    <h5>for the students...</h5>
                    <p id="studentsdescrip">Students earn points based on their quality of grades. These points can be redeemed for deals and items from local businesses and organizations.</p><br>
                </div>

                <div class="forthecol" id="teacherscol">
                    <div id="teacherscirc"></div>
                    <h5>for the teachers...</h5>
                    <p id="teachersdescrip">Teachers can upload study material and verify students' grades in order to help students suceed academically.</p><br>
                </div>

                <div class="forthecol" id="parentscol">
                    <div id="parentscirc"></div>
                    <h5>for the parents...</h5>
                    <p id="parentsdescrip">Parents can get involved with their child's progress and receive notifications and status updates.</p><br>
                </div>

                <div class="forthecol" id="businessescol">
                    <div id="businessescirc"></div>
                    <h5>for the businesses...</h5>
                    <p id="businessesdescrip">Businesses, small and large, can gain exposure and customers from contributing to furthering future education.</p><br>
                </div>


                <div class="clear"></div><!--clear all 4forthecolumns-->
            </div><!--end about2cnt-->
        </div><!--end about2-->
    </section><!--end about-->


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
                <div id="mainfindrewbtn"><a href="{{ action('PublicRewardController@index') }}">find rewards now!<img src="/images/whiterightarrow.png" alt="white right arrow"></a></div>
            </div>
            <div class="rewpanhalf">
                <img src="/images/trophy.svg" alt="trophy">
            </div>
            <div class="clear"></div><!--clear both rewpanhalf-->
        </div><!--end rewardspancnt-->
    </section><!--end reward panel-->

    @if(is_null($user))

         @include('home.partials.registrationOpen')
    @else

        @include('home.partials.userProfile')

    @endif


    <div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->

@include('home.partials.footer')

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
