<!--manage profile-->
<section id="manage">

    <div id="managepancnt">

        <h1 class="whiteltgray">manage your profile</h1>
        <div id="manageinnerwrap">
            <div id="userinfomanage">
                <p>
                    name: {{$user->fullname}}<br>
                    email: {{$user->email}}<br>
                    @if(get_class($user)=='App\Teacher')
                        school: {{$user->school->name}}<br>
                    @elseif(get_class($user)=='App\Student')
                        school: {{$user->school->name}}<br>
                        grade: {{$user->grade}}<br>
                    @endif
                </p>
            </div>

            <div id="managebtns">
                <form action="#" method="post">
                    <a href="{{action('HomeController@changePassword')}}"><button type="button" value="change password" id="changepassbtn" class="managebtn">change password</button></a><br>
                    <a href="#"><button type="button" value="view redeemed rewards" id="viewredrewbtn" class="managebtn">view redeemed rewards</button></a>
                </form>
            </div>

        </div><!--end manage panel content-->
        <div class="clear"></div><!--clear both cols-->
</section><!--end manage panel-->
</section><!--end my acct-->
