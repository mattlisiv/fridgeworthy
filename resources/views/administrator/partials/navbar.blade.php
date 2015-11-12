
<br>
<br>
<div class="row" class="col-md-10 col-xs-8">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#adminNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{action('Admin\AdministratorController@index')}}">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="adminNavBar">
                <ul class="nav navbar-nav">
                    <li><a href="{{action('Admin\DistrictController@index')}}" >Districts</a></li>
                    <li><a href="{{action('Admin\RegionController@index')}}">Regions</a></li>
                    <li> <a href="{{action('Admin\SchoolController@index')}}">Schools</a></li>
                    <li> <a href="{{action('Admin\CourseController@index')}}">Courses</a></li>
                    <li> <a href="{{action('Admin\BusinessController@index')}}">Businesses</a></li>
                    <li> <a href="{{action('Admin\RewardController@index')}}">Rewards</a></li>
                    <li> <a href="{{action('Admin\CouponController@index')}}">Coupons</a></li>
                    <li> <a href="{{action('Admin\UserController@index')}}">Users</a></li>
                    <li> <a href="{{action('Admin\EmailController@index')}}">Email List</a></li>
                    <li> <a href="/logs">Application Logs</a></li>

                </ul>
            </div>
        </div>
    </nav>
</div>