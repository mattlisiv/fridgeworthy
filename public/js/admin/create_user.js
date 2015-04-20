$(document).ready(function() {



        hidePasswordDataFields();
        hideNonCommonDataFields();
        if(user_status){

            $("$status").val(user_status);
        }
        //If user type has been define //
        if(user_type){
            var user = user_type.substring(3);
            switch(user){

                case 'Teacher':
                    $("#role_select").val('1');
                    displayTeacherDataFields();
                    break;
                case 'Student':
                    $("#role_select").val('2');
                    if(grade){
                        $("#grade").val(grade);
                    }
                    displayStudentDataFields();
                    break;
                case 'Admin':
                    $("#role_select").val('5');
                    displayAdminDataFields();
                    break;
                case 'BusinessManager':
                    $("#role_select").val('4');
                    displayBusinessManagerDataFields();
                    break;
                case 'Guardian':
                    $("#role_select").val('3');
                    displayGuardianDataField();
                    break;
                default:
                    return;

            }

        }else{

            displayTeacherDataFields();
        }



        $("#role_select").change(function(){

            var role = $('#role_select :selected').val();
            switch(role){

                //Teacher//
                case '1':
                    hideNonCommonDataFields();
                    displayTeacherDataFields();
                    break;
                //Student//
                case '2':
                    hideNonCommonDataFields();
                    displayStudentDataFields();
                    break;
                //Guardian//
                case '3':
                    hideNonCommonDataFields();
                    displayGuardianDataField();
                    break;
                //BusinessManager//
                case '4':
                    hideNonCommonDataFields();
                    displayBusinessManagerDataFields();
                    break;
                //Admin/.
                case '5':
                    hideNonCommonDataFields();
                    displayAdminDataFields();
                    break;
                default:
                    hideNonCommonDataFields();


            }

        });

        $('input[type=radio]').change(function(){

            var value = $('input[name=password_type]:checked').val();
            if(value=='auto-create'){

                hidePasswordDataFields();

            }else{

                displayPasswordDataFields();
            }
        });
    });

function hidePasswordDataFields(){
    $("#password_div").hide();
    $("#password_retype_div").hide();

}

function displayPasswordDataFields(){
    $("#password_div").show();
    $("#password_retype_div").show();

}

function hideNonCommonDataFields(){
    $("#business_select_div").hide();
    $("#school_select_div").hide();
    $("#parent_email_div").hide();
    $("#grade_div").hide();
    $("#points_div").hide();

}

function displayTeacherDataFields(){

    $("#school_select_div").show();
    $("#points_div").show();


}

function displayStudentDataFields(){

    $("#school_select_div").show();
    $("#parent_email_div").show();
    $("#grade_div").show();
    $("#points_div").show();

}

function displayGuardianDataField(){

    $("#school_select_div").show();
    $("#points_div").show();

}

function displayBusinessManagerDataFields(){

    $("#business_select_div").show();
}


function displayAdminDataFields(){


}