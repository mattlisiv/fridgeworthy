$(document).ready(function() {


    $('input[type=radio]').change(function(){

        var value = $('input[name=couponType]:checked').val();
        if(value=='auto-managed'){

            displayAutoManagedOptions();

        }else{

            displayFridgeWorthyGeneratedCoupons();
        }
    });

});


function displayAutoManagedOptions(){

    $("#csvFileDiv").show();
    $("#numberOfCouponsDiv").hide();


}

function displayFridgeWorthyGeneratedCoupons(){

    $("#csvFileDiv").hide();
    $("#numberOfCouponsDiv").show();


}