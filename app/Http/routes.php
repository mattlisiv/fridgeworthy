<?php

/**Be sure to put wildcard below explicit value **/

/**@TODO Implement middleware for all routes **/

/**Home Page **/
Route::get("/","HomeController@index");
Route::get("privacypolicy","StaticPagesController@privacy");
Route::get("infographic","StaticPagesController@infographic");
Route::post("logout","HomeController@logout");


/**Admin Routes **/
Route::get("admin","AdministratorController@index");
Route::resource('admin/districts','DistrictController');
Route::resource('admin/regions','RegionController');
Route::resource('admin/schools','SchoolController');
Route::resource('admin/businesses','BusinessController');
Route::resource('admin/rewards','RewardController');
Route::resource('admin/users','UserController');
Route::resource('admin/coupons','CouponController');

/**@TODO Implement related controllers **/
/**Public Routes **/

/**Reward Routes **/
Route::get("rewards","PublicRewardController@index");
Route::get("rewards/{id}","PublicRewardController@show");

/**User Routes **/
Route::get("account","AccountController@index");

/**Course Management Routes **/
Route::get("course/{id}","PublicCourseController@show");




/**Authorization Routes **/
Route::controllers([
   'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
