<div class="row" class="col-md-10 col-xs-8">
    <br>
    <br>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{action('AdministratorController@index')}}">Admin Panel</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="{{action('DistrictController@index')}}" >Districts</a></li>
                    <li><a href="{{action('RegionController@index')}}">Regions</a></li>
                    <li> <a href="{{action('SchoolController@index')}}">Schools</a></li>
                    <li> <a href="{{action('BusinessController@index')}}">Businesses</a></li>
                    <li> <a href="{{action('RewardController@index')}}">Rewards</a></li>
                    <li> <a href="{{action('UserController@index')}}">Users</a></li>


                </ul>
            </div>
        </div>
    </nav>
</div>