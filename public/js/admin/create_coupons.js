$(document).ready(function() {


    $('input[type=radio]').change(function(){

        var value = $('input[name=couponType]:checked').val();
        if(value=='auto-managed'){

            displayCSVInput();

        }else{

            hideCSVInput();
        }
    });

});


function displayCSVInput(){

    $("#csvFileDiv").show();

}

function hideCSVInput(){

    $("#csvFileDiv").hide();

}