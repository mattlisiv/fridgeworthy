$(document).ready(function() {


    $('input[type=radio]').change(function(){

        var value = $('input[name=couponType]:checked').val();
        if(value=='auto-managed'){

            displayAutoManagedOptions();

        }else if(value=='imaged'){

            displayImageGeneratedCoupons();

        } else{

            displayFridgeWorthyGeneratedCoupons();
        }
    });

});


function displayAutoManagedOptions(){

    $("#csvFileDiv").show();
    $("#numberOfCouponsDiv").hide();
    $("#imageDiv").hide();



}

function displayFridgeWorthyGeneratedCoupons(){

    $("#csvFileDiv").hide();
    $("#numberOfCouponsDiv").show();
    $("#imageDiv").hide();



}

function displayImageGeneratedCoupons(){

    $("#imageDiv").show();
    $("#csvFileDiv").hide();
    $("#numberOfCouponsDiv").show();


}