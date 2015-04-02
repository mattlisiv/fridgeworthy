<?php

/**Be sure to put wildcard below explicit value **/



Route::get("/","HomeController@index");
Route::get("privacypolicy","StaticPagesController@privacy");
Route::get("infographic","StaticPagesController@infographic");


/**Admin Routes **/
Route::get("admin","AdministratorController@index")->before('role:admin');

Route::resource('admin/districts','DistrictController');
Route::resource('admin/regions','RegionController');
Route::resource('admin/schools','SchoolController');
Route::resource('admin/businesses','BusinessController');
Route::resource('admin/rewards','RewardController');
Route::resource('admin/users','UserController');

Route::controllers([
   'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);