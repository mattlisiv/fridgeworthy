<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>fridgeworthyrewards.com</title>
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <!--CSS links-->
    <link href="/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/css/responsive.css" rel="stylesheet" type="text/css">

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

<body class="rcbg" ontouchstart="">

<div class="mainwrap">


    <!--start sticky nav-->
    <nav class="my-sticky-element">
        <a href="index.html#home"><div class="navlogo"><img src="/images/fwlogo-nav.png" alt="FridgeWorthy logo"></div></a>

        <div class="navrightcnt">
            <div class="navpoints"><h6>You currently have <span class="pointshighlight">12</span> Fridge points!</h6></div>

            <!--main desktop links-->
            <div class="navmainlinks">
                <ul>
                    <li><a href="index.html#home">home</a></li>
                    <li><a href="index.html#aboutpanel">about us</a></li>
                    <li><a href="index.html#rewardspanel" class="active">rewards</a>
                        <ul class="dropdownmenu"><li><a href="rewardscenter.html">rewards center</a></li></ul>
                    </li>
                    <li><a href="index.html#mypointspanel">my account</a>
                        <ul class="dropdownmenu">
                            <li><a href="index.html#mypointspanel">my points</a>
                            <li"><a href="index.html#submitgradepanel">submit a grade</a></li>
                    <li><a href="index.html#managepanel">manage my profile</a></li>
                    <li><a href="#logoutmodal" class="modal-popup">logout</a>logout</a></li>
                </ul>
                </li>
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
                            <li class="menu-item"><a href="index.html#home">home</a></li>
                            <li class="menu-item"><a href="index.html#aboutpanel">about us</a></li>
                            <li class="menu-item menu-item-has-children"><a href="index.html#rewardspanel">rewards</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="rewardscenter.html">rewards center</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="index.html#mypointspanel" style="border-bottom: none;">my account</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="index.html#mypointspanel">my points</a></li>
                                    <li class="menu-item"><a href="index.html#submitgradepanel">submit a grade</a></li>
                                    <li class="menu-item"><a href="index.html#managepanel">manage my profile</a></li>
                                    <li class="menu-item"><a href="#logoutmodal" class="modal-popup">logout</a></li>
                                </ul>
                            </li>
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

    <!--rewarddetail-->
    <section id="rewcentdetailpanelin">
        <div class="rewcentdetailpancnt">

            <div class="rewardboxlg">

                <div class="rewardinfo">
                    <div class="rewarddetcol">
                        <h1 class="orange">{{$reward->name}}</h1>
                        <h3>This reward costs <span class="pointshighlight">{{$reward->points_required}}</span> Fridge points</h3>
                        <p>{{$reward->description}}</p>
                    </div>

                    <div class="rewarddetcol">
                        <img src="/images/longhorn@2x.gif" class="rewardlogo"/>
                        <div class="redeemnowbtn"><a href="#">redeem reward<img src="/images/whiterightarrow.png" alt="white right arrow"></a></div>
                    </div>
                </div>

                <div class="rewarddet2ndrow">
                    <a href="{{action('PublicRewardController@index')}}" class="backrewbtn"><img src="/images/backarrowreg.png"><p>back to rewards</p></a>
                </div>

            </div><!--endrewardsboxlg-->

        </div><!--endrewardscentpancnt-->
        <div class="push"></div><!--push content footer-->
    </section><!--end rewcendetailpanel-->

    <div class="push"></div>
</div><!--end mainwrap-->
<!--footer-->
@include('home.partials.footer')
<!--end footer-->

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