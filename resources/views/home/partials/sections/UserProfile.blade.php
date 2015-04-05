<!--manage profile-->
<section id="managepanel">
    <div id="managepancnt">

        <h1 class="whiteltgray">manage your profile</h1>
        <div class="managehalf" id="userinfomanage">
            <div class="manageinfo">
                <h3 class="bluenoshad">user info</h3>
                <p>
                    name: {{$user->first_name}} {{$user->last_name}}<br>
                    email: {{$user->email}}<br>
                    school: {{$user->school->name}}<br>
                    @if($user->hasRole('student'))
                    grade: {{$user->grade}}
                        @endif
                </p>
            </div>

        </div>

        </div>

        <div class="clear"></div><!--clear both cols-->
</section><!--end manage panel-->
<!--end my acct--></section>