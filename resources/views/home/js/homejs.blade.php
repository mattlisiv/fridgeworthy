<!--responsive menu-->
<script type="text/javascript">
    jQuery(function($){
        $( '.menu-btn' ).click(function(){
            $('.responsive-menu').toggleClass('expand')
        })
    })
</script>
<script>
    jQuery(document).ready(function($){


        $(".menu-item-has-children").append("<div class='open-menu-link open'>+</div>");
        $('.menu-item-has-children').append("<div class='open-menu-link close'>—</div>");
        $('.open').addClass('visible');
        $('.open-menu-link').click(function(e){
            var childMenu =  e.currentTarget.parentNode.children[1];
            if($(childMenu).hasClass('visible')){
                $(childMenu).removeClass("visible");
                $(e.currentTarget.parentNode.children[3]).removeClass("visible");
                $(e.currentTarget.parentNode.children[2]).addClass("visible");
            } else {
                $(childMenu).addClass("visible");
                $(e.currentTarget.parentNode.children[2]).removeClass("visible");
                $(e.currentTarget.parentNode.children[3]).addClass("visible");
            }


        });


        $(document).ready( function() {

            $('#teachstudselect').bind('change', function (e) {

                if( $("#teachstudselect").val() == '2') {
                    $("#studentspecific").show();
                    $("#parent-personal-info").show();
                    $("#parent-profile").show();
                    $("#user-info").text("student info");
                    $("#user-profile").text("student profile");



                }
                else if ($('#teachstudselect').val() == '1'){
                    $('#studentspecific').hide();
                    $("#parent-personal-info").hide();
                    $("#parent-profile").hide();
                    $("#user-info").text("teacher info");
                    $("#user-profile").text("teacher profile");


                }
            });
        });

        $("#studentscirc").on('mouseenter',function(){

            $("#studentsdescrip").text("Click to learn how students earn great rewards.");

        }).on('mouseleave', function(){

            $("#studentsdescrip").text("Students earn points based on their quality of grades. These points can be redeemed for deals and items from local businesses and organizations.");



        }).on('click', function(){

            window.location.href = "/infographic";

        });

        $("#parentscirc").on('mouseenter',function(){

            $("#parentsdescrip").text("Click to learn how parents can receive updates on their child's progress.")

        }).on('mouseleave', function(){

            $("#parentsdescrip").text("Parents can get involved with their child's progress and receive notifications and status updates.");

        }).on('click', function(){

            window.location.href = "/infographic";

        });

        $("#teacherscirc").on('mouseenter',function(){

            $("#teachersdescrip").text("Click to learn how teachers can help their students achieve success.");

        }).on('mouseleave', function(){

            $("#teachersdescrip").text("Teachers can upload study material and verify students' grades in order to help students suceed academically.");

        }).on('click', function(){

            window.location.href = "/infographic";

        });

        $("#businessescirc").on('mouseenter',function(){

            $("#businessesdescrip").text("Click to learn how businesses can help their local schools.");

        }).on('mouseleave', function(){

            $("#businessesdescrip").text("Businesses, small and large, can gain exposure and customers from contributing to furthering future education.");

        }).on('click', function(){

            window.location.href = "/infographic";

        });


    });


</script>