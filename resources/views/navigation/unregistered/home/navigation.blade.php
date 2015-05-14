<!--start sticky nav-->
<nav class="my-sticky-element">
    <div class="navlogo">
        <div>
            <img src="{{asset("images/fwlogo-nav.png")}}" alt="FridgeWorthy logo">
        </div>
    </div>
    <div class="navrightcnt">

            @include('home.partials.nav.LoginBanner')
                        <!--main desktop links-->
        <div class="navmainlinks">
            <div  class=social-media-div" style="display: inline;padding-left: 40px">
                <h6 class="social-media-banner" style="float: left;display: inline">Find us on social media.</h6>
                <a href="https://www.facebook.com/fridgeworthyrewards" class="social-media-icon"><img height="30px" width="30px" src="{{asset('images/fblogo50.png')}}"></a>
                <a class="social-media-icon" style="padding-left: 20px"><img height="30px" width="30px" src="{{asset('images/twitterlogo.png')}}"></a>
                <a class="social-media-icon" style="padding-left: 20px"><img height="30px" width="30px" src="{{asset('images/instagramlogo.jpg')}}"></a>
            </div>
                    <ul>
                        <li><a href="#home" class="scrollbtn">home</a></li>
                        <li><a href="#about" class="scrollbtn">about us</a></li>
                        <li><a href="#rewards" class="scrollbtn">rewards</a>
                            <ul class="dropdownmenu"><li><a href="{{action('PublicRewardController@index')}}" >rewards center</a></li></ul>
                        </li>
                        <li><a href="#registration" class="scrollbtn">registration</a></li>
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
                                <li class="menu-item"><a href="#about" class="scrollbtn">about us</a></li>
                                <li class="menu-item menu-item-has-children"><a href="#rewards" class="scrollbtn">rewards</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="{{action('PublicRewardController@index')}}">rewards center</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="#registration" class="scrollbtn" style="border-bottom: none;">registration</a></li>
                            </ul>
                        </div><!--end menu-header-->
                    </div><!--end responsive-menu-->
                </div><!--mobile-nav-->

    </div><!--end right content-->
    <div class="clear"></div><!--clear both cols-->
</nav><!--end nav-->