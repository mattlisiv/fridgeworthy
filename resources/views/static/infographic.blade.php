<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FridgeWorthy Rewards</title>
    <link href="/css/infographic.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />


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

<body>

<!--start login-->
<div id="loginmodal" class="popup">
    <div class="popup-container">
        <div class="popup-content">
            <h5>Login Here</h5>
            <form action="#" method="post">
                <input type="text" placeholder="username"/>
                <input type="text" placeholder="password"/> <br>
                <button type="button" value="submit" class="popup-close js-popup-close modal-close smbtnredmodal">cancel</button>
                <button type="button" value="submit" class="smbtngreenmodal">submit</button>
            </form>
        </div>
    </div>
</div>



<div id="headerwrapper">
    <!--start sticky nav-->
    <nav class="my-sticky-element">
        <div class="navlogo"><img src="images/fwlogo-nav.png" alt="FridgeWorthy logo"></div>

        <div class="navrightcnt">
            <div class="navlogin">
                <h6>Get involved with FridgeWorthy!</h6>
                <form action="#" method="post" id="navloginbtns">
                    <a href="#loginmodal" class="modal-popup"><button type="button" value="login" class="smbtn loginbtn">login</button></a>
                    <a href="index.php#registrationpanel" data-scroll="#registrationpanel" class="scrollbtn"><button type="button" value="register" class="smbtn">register</button></a>
                </form>
            </div><!--end navlogin-->

            <!--main desktop links-->
            <div class="navmainlinks">
                <ul>
                    <li><a href="index.php#home" class="scrollbtn">home</a></li>
                    <li><a href="index.php#aboutpanel" class="scrollbtn">about us</a></li>
                    <li><a href="index.php#rewardspanel" class="scrollbtn">rewards</a>
                        <ul class="dropdownmenu"><li><a href="rewardscentertemp.html" class="scrollbtn">rewards center</a></li></ul>
                    </li>
                    <li><a href="index.php#registrationpanel" class="scrollbtn">registration</a></li>
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
                            <li class="menu-item"><a href="index.php#home" class="scrollbtn">home</a></li>
                            <li class="menu-item"><a href="index.php#aboutpanel" class="scrollbtn">about us</a></li>
                            <li class="menu-item menu-item-has-children"><a href="index.php#rewardspanel" class="scrollbtn">rewards</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="rewardscentertemp.html" class="scrollbtn">rewards center</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="index.php#registrationpanel" class="scrollbtn" style="border-bottom: none;">registration</a></li>
                        </ul>
                    </div><!--end menu-header-->
                </div><!--end responsive-menu-->
            </div><!--mobile-nav-->

        </div><!--end right content-->
        <div class="clear"></div><!--clear both cols-->
    </nav><!--end nav-->
    <div id="title">

        <img src="images/infographic-dektop-h-1.svg" alt="How Hard Work Pays Off">
        <div id="stars">
            <img src="images/infographic-dektop-h-2.svg" alt="stars">
        </div>
    </div>


    <div id="infographic-h">
        <img src="images/infographic-dektop-h-3.svg" alt="infographic">
        <!--footer-->
       @include('home.partials.Footer')
    </div>

    <div id="infographic-v">
        <img src="images/infographic-dektop-v-3.svg" alt="infographic">
        @include('home.partials.Footer')
    </div>
</div>
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
