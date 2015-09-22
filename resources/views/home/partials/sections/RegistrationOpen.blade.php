
<section id="registration">
    <div id="regpancnttemp">
        <h1 class="whitedkgray">register here</h1>
        <br>
        <br>
        <form action="{{action('HomeController@register')}}" method="post" id="signup">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div id="userinfo" class="regthird">
                <h3 class="orange">user profile</h3>
                    <span style="max-width: 500px"class="custom-dropdownBlue" id="teachstud">
                <select class="customSelect" name="role" id="teachstudselect">
                    <option value='' disabled selected style='display:none;'>are you a teacher or student?</option>
                    <option value="1">teacher</option>
                    <option value="2">student/parent</option>
                </select>
                </span>
                <br>
                <br>
                <p class="white">Parents and students will create a shared account.</p>
                <br>
                <div style="display: none" id="parent-personal-info">
                    <h3 class="orange">parent info</h3>
                    <input type="text" placeholder="first name" name="parent_first_name" value="{{old('parent_first_name')}}"/>
                    <input type="text" placeholder="last name" name="parent_last_name" value="{{old('parent_last_name')}}"/>
                </div>
                <br>
                <div  style="display: none" id="parent-profile">
                <h3 class="orange">parent profile</h3>
                <input type="email" placeholder="parent email" name="parent_email" value="{{old('parent_email')}}"/>
                <label for="user_password_new"></label>
                <input class="tooltip" type="password" placeholder="parent password" name="parent_password"/>
                <label for="user_password_repeat"></label>
                <input type="password" placeholder="re-enter parent password" name="parent_password_confirmation"/>
                <label for="user_email"></label>
                </div>
            </div><!--end 1st regthird-->


            <div id="persinfo" class="regthird">
                <h3 id="user-info" class="orange">user info</h3>
                <input type="text" placeholder="first name" name="first_name" value="{{old('first_name')}}"/>
                <input type="text" placeholder="last name" name="last_name" value="{{old('last_name')}}"/>
                <br>
                <br>
                <h3 id="user-profile" class="orange">registration</h3>
                <input type="email" placeholder="email" name="email" value="{{old('email')}}"/>
                <label for="user_password_new"></label>
                <input class="tooltip" type="password" placeholder="password" name="password"/>
                <label for="user_password_repeat"></label>
                <input type="password" placeholder="re-enter password" name="password_confirmation"/>
                <label for="user_email"></label>
                <br>

                <div class="clear"></div>
            </div><!--end 2nd regthird-->

            <div style="display: block" id="schoolinfo" class="regthird">
                    <h3 class="orange">school info</h3>
                <span class="custom-dropdownBlue" id="selectschool">
                    <select class="customSelect" name="school_id">
                        <option value='' disabled selected style='display:none;'>school</option>
                        @foreach($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                        @endforeach
                    </select>
                </span>
                    <br>
                    <div id="studentspecific" style="display: none;padding-bottom: 10px">
                    <span class="custom-dropdownBlue" id="teachstud">
                        <select class="customSelect" name="grade">
                            <option value='' disabled selected style='display:none;'>select student's grade</option>
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
                    </div>
                </div>
                <br>
                <br>
                <div>
                    <br>
                    <br>
                    <br>
                    <div style="padding-top: 10px;">
                        <br>
                        <label  id="terms-label" for="authorization">By checking this box,I am acknowledging I have read and agree to the <a class="plink" target="_blank" href="{{action('HomeController@TermsAndConditions')}}">Terms and Conditions</a> of this site.</label>
                        <input type="checkbox" id="authorization" name="authorization"/>
                    </div>
                   </div>
                <br>
                <button type="submit" class="smbtn" name="register">submit</button>



                <br>
        </form>

        @if (!$errors->registration->isEmpty())
            <div style="color:red;display:block;text-align: right">
                <br>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->registration->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        </div>
        <div class="clear"></div><!--clear all regthird-->

</section><!--end registration panel-->


@if (!$errors->registration->isEmpty())
    <script type="text/javascript">
        $(document).ready().scrollTo(document.getElementById('registration'), 800);
    </script>
    @endif