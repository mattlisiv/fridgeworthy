<div id="homeformblock">
    @if(is_null($user))
    <div id="sublock">
        <h1 class="whitedkorange">sign up</h1>
        <h6 class="white">for emails & updates</h6>
        {!! Form::open(['url'=>'signup-for-listserv','id'=>'signup']) !!}
        {!! Form::text('first_name',null,['class'=>'tfield','placeholder'=>'first name']) !!}
        {!! Form::text('last_name',null,['class'=>'tfield','placeholder'=>'last name']) !!}
        {!! Form::text('email',null,['class'=>'tfield','placeholder'=>'email']) !!}
         <span class="custom-dropdownBlue">
            <select name="type" class="customSelect">
                <option value='' disabled selected style='display:none;'>i am a...</option>
                <option value="student">student</option>
                <option value="teacher">teacher</option>
                <option value="parent">parent</option>
                <option value="business">business owner/affiliate</option>
                <option value="business">other</option>

            </select>
         </span>
        <div class="clear"></div>
        <button type="submit" value="submit" class="smbtnblue" style="margin-top: 10px;">submit</button>
        {!! Form::close() !!}

    </div>
        <div style="color:red;margin: 0 auto">
            <p>
                @include('home.partials.errors')
            </p>
        </div>
    <div id="liblock">
        <h1 class="whiteblue">get involved</h1>
        <h6 class="white">with FridgeWorthy!</h6>
        <form action="#" method="post" id="loginmain">
            <a href="#loginmodal" class="modal-popup"><button type="button" value="login" class="smbtn">login</button></a><br>
            <a href="#registration" data-scroll="#registration" class="scrollbtn"><button type="button" value="register" class="smbtn">register</button></a>
        </form>
    </div>
    <div id="learnblock">
        <div id="mainlearnbtn"><a href="#about" data-scroll="#about" class="scrollbtn">learn more<img src="images/whitedownarrow-sm.png" alt="white down arrow"></a></div>
    </div>
    @else
        <div id="learnblock">
            <div id="mainlearnbtn"><a href="{{action('StaticPagesController@infographic')}}">learn more</a></div>
        </div>

        <div id="myacctblock">
            @if(get_class($user)!='App\BusinessManager')
                <div id="myacctbtn"><a href="#myacct" data-scroll="#myacct" class="scrollbtn">my profile<img src="images/whitedownarrow-sm.png" alt="white down arrow"></a></div>
            @else
                <div id="myacctbtn"><a href="#manage" data-scroll="#manage" class="scrollbtn">my profile<img src="images/whitedownarrow-sm.png" alt="white down arrow"></a></div>
            @endif
        </div>
    @endif
</div>
