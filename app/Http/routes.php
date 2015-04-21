<?php

/**Be sure to put wildcard below explicit value **/


$domain = getenv('DOMAIN') ?: 'fridgeworthy.us';


Route::group(array('domain' => 'api.'.$domain), function()
{
    Route::get("/",function(){

        return 'API HOME';
    });


});



Route::group(array('domain' => 'admin.'.$domain,'middleware'=>'authorize','user_type'=>['App\Admin']), function()
{
    /**Admin Routes **/
    Route::get("/",'Admin\AdministratorController@index');
    Route::resource('districts','Admin\DistrictController');
    Route::resource('regions','Admin\RegionController');
    Route::resource('schools','Admin\SchoolController');
    Route::resource('businesses','Admin\BusinessController');
    Route::resource('rewards','Admin\RewardController');
    Route::resource('users','Admin\UserController');
    Route::resource('coupons','Admin\CouponController');
});


Route::group(array('domain' => 'business.'.$domain,'middleware'=>'authorize','user_type'=>['App\BusinessManager']), function()
{
    Route::get('/','Business\HomeController@index');
});


Route::group(array('domain' => $domain), function()
{
    /**Home Page **/
    Route::get("/","HomeController@index");
    Route::get("privacypolicy","StaticPagesController@privacy");
    Route::get("infographic","StaticPagesController@infographic");
    Route::post("logout","HomeController@logout");
    Route::post("login","HomeController@login");
    Route::post("register","HomeController@register");
    Route::get("error","HomeController@error");


    /**Public Routes **/

    /**Reward Routes **/
    Route::get("rewards","PublicRewardController@index");
    Route::get("rewards/{id}","PublicRewardController@show");



});

Route::group(array('domain' => $domain,'middleware'=>'authorize','user_type'=>['App\Teacher','App\Student']), function()
{

    /**User Routes **/
    Route::get("account","AccountController@index");

    /**Course Management Routes **/
    Route::get("course/{id}","PublicCourseController@show");


});


/**Authorization Routes **/
Route::controllers([
   'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
