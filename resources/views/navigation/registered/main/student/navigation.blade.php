<!--start sticky nav-->
<nav class="my-sticky-element">
    <div class="navlogo">
        <div>
            <a href="{{action('HomeController@index')}}"><img src="{{asset('images/fwlogo-nav.png')}}" alt="FridgeWorthy logo"></a>
        </div>
    </div>
    <div class="navrightcnt">


        @include('home.partials.nav.PointsDisplayBanner')

        <!--main desktop links-->
        <div class="navmainlinks">

            <ul>
                <li><a href="{{url('/')}}#home" >home</a></li>
                <li><a href="{{action('CourseManagerController@viewMyCourses')}}">my classes</a>
                    <ul class="dropdownmenu">
                        @if(count($user->courses()->get()))
                            @foreach($user->courses()->get() as $course)
                                <li><a href="{{action('CourseManagerController@viewCourse',$course->id)}}" >{{$course->name}}</a></li>
                            @endforeach
                        @endif
                            <li><a href="{{action('CourseManagerController@enrollInCourse')}}" >enroll in class</a></li></ul>
                </li>
                <li><a href="{{url('/')}}#rewards">rewards</a>
                    <ul class="dropdownmenu"><li><a href="{{action('PublicRewardController@index')}}" >rewards center</a></li></ul>
                </li>
                <li><a href="{{url('/')}}#myacct">my account</a>
                    <ul class="dropdownmenu">
                        <li><a href="{{url('/')}}#manage">manage my profile</a></li>
                        <li><a href="#logoutmodal" class="modal-popup">logout</a></li>
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
                        <li class="menu-item"><a href="{{url('/')}}#home" >home</a></li>
                        <li class="menu-item"><a href="{{action('CourseManagerController@viewMyCourses')}}" >my classes</a>
                            <ul class="sub-menu">
                                @if(count($user->courses()->get()))
                                    @foreach($user->courses()->get() as $course)
                                        <li class="menu-item"><a href="{{action('CourseManagerController@viewCourse',$course->id)}}" >{{$course->name}}</a></li>
                                    @endforeach
                                @endif
                                <li class="menu-item"><a href="{{action('CourseManagerController@enrollInCourse')}}">enroll in class</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children"><a href="{{url('/')}}#rewards">rewards</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{action('PublicRewardController@index')}}">rewards center</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children"><a href="{{url('/')}}#myacct">my account</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="{{url('/')}}#manage">manage my profile</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children"><a href="#logoutmodal" class="modal-popup">logout</a></li>
                    </ul>
                </div><!--end menu-header-->
            </div><!--end responsive-menu-->
        </div><!--mobile-nav-->

    </div><!--end right content-->
    <div class="clear"></div><!--clear both cols-->
</nav><!--end nav-->