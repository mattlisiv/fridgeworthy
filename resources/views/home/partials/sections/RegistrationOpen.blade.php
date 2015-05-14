
<section id="registration">
    <div id="regpancnttemp">
        <h1 class="whitedkgray">register here</h1>

        <form action="{{action('HomeController@register')}}" method="post" id="signup">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="userinfo" class="regthird">
                <h3 class="orange">user profile</h3>
                <input type="email" placeholder="email" name="email"/>
                <label for="user_password_new"></label>
                <input type="password" placeholder="password" name="password"/>
                <label for="user_password_repeat"></label>
                <input type="password" placeholder="re-enter password" name="password_confirmation"/>
                <label for="user_email"></label>
                <p class="white">Please ensure this is a valid email. It will be used to confirm your account.</p>
            </div><!--end 1st regthird-->


            <div id="persinfo" class="regthird">
                <h3 class="orange">personal info</h3>
                <input type="text" placeholder="first name" name="first_name"/>
                <input type="text" placeholder="last name" name="last_name"/>

                <div class="clear"></div>
            </div><!--end 2nd regthird-->


            <div id="schoolinfo" class="regthird">
                <h3 class="orange">school info</h3>
<span class="custom-dropdownBlue" id="selectschool">
<select class="customSelect" name="school_id">
    <option value='' disabled selected style='display:none;'>school</option>
    @foreach($schools as $school)
        <option value="{{$school->id}}">{{$school->name}}</option>
    @endforeach

</select>
</span>
<span class="custom-dropdownBlue" id="teachstud">
<select class="customSelect" name="role" id="teachstudselect">
    <option value='' disabled selected style='display:none;'>are you a teacher or student?</option>
    <option value="1">teacher</option>
    <option value="2">student</option>
</select>
</span>
                <div id="studentspecific" style="display: none">
<span class="custom-dropdownBlue" id="teachstud">
<select class="customSelect" name="grade">
    <option value='' disabled selected style='display:none;'>select grade</option>
    <option value="0">Kindergarten</option>
    <option value="1">1st</option>
    <option value="2">2nd</option>
    <option value="3">3rd</option>
    <option value="4">4th</option>
    <option value="5">5th</option>
    <option value="6">6th</option>
    <option value="7">7th</option>
    <option value="8">8th</option>
    <option value="9">9th</option>
    <option value="10">10th</option>
    <option value="11">11th</option>
    <option value="12">12th</option>

</select>
</span>

                    <p class="white">Please enter parent email address</p>
                    <input type="text" placeholder="parent email address" name="parent_email"/>

                    <div class="clear"></div>
                </div><!--end 3rd regthird-->
                <button type="submit" class="smbtn" name="register">submit</button>
        </form>
        @if (!$errors->registration->isEmpty())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->registration->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="clear"></div><!--clear all regthird-->
    </div><!--end student specific section -->

    </div><!--end regspancnt-->
</section><!--end registration panel-->
