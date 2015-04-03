<!--start sticky nav-->
<nav class="my-sticky-element">
    <a href="index.html#home"><div class="navlogo"><img src="/images/fwlogo-nav.png" alt="FridgeWorthy logo"></div></a>

    <div class="navrightcnt">

        @if(is_null($user))
            @include('home.partials.loginBanner')
            @else
                @include('home.partials.pointsDisplayBanner')
                    @endif

        <!--main desktop links-->
        <div class="navmainlinks">
            <ul>
                <li><a href="{{action('HomeController@index')}}">home</a></li>
                <li><a href="{{action('HomeController@index')}}">about us</a></li>
                <li><a href="{{action('PublicRewardController@index')}}" class="active">rewards</a>
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