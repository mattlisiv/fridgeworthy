<?php

/**Be sure to put wildcard below explicit value **/


$domain = getenv('DOMAIN') ?: 'fridgeworthy.us';



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
    Route::resource('courses','Admin\CourseController');
    Route::resource('fileuploads','Admin\CourseFilesController');

});


Route::group(array('domain' => 'business.'.$domain,'middleware'=>'authorize','user_type'=>['App\BusinessManager']), function()
{
    Route::get('/','Business\HomeController@index');
});

Route::group(array('domain' =>$domain,'middleware'=>'authorize','user_type'=>['App\BusinessManager']), function(){

    Route::post("submit_access_code",'Business\RewardController@submitAccessCode');


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





    /**Reward Routes **/
    Route::get("rewards","PublicRewardController@index");
    Route::get("rewards/{id}","PublicRewardController@show");
    Route::get("forgotpassword","HomeController@forgotPassword");
    Route::post("uploadtest","HomeController@uploadTest");
    Route::get("upload","HomeController@upload");


});



Route::group(array('domain' => $domain,'middleware'=>'authorize','user_type'=>['App\Teacher','App\Student']), function()
{

    /**User Routes **/
    Route::get("account","AccountController@index");
    Route::get("mycourses","CourseManagerController@viewMyCourses");
    Route::get("course/{id}",['as'=>'id','uses'=>"CourseManagerController@viewCourse"]);
    Route::get("myassignments","AssignmentManagerController@viewMyAssignments");
    Route::get("myassignments/{id}","AssignmentManagerController@viewAssignment");
    Route::get("course/{id}/viewgrades",['as'=>'id','uses'=>"AssignmentManagerController@viewGrades"]);
    Route::get("mygrades/{id}","AssignmentManagerController@viewIndividualGrade");
    Route::get("myassignments/{id}/submitgrade","AssignmentManagerController@submitGrade");
    Route::post("store_grade","AssignmentManagerController@storeGrade");

});


Route::group(array('domain' => $domain,'middleware'=>'authorize','user_type'=>['App\Teacher']), function()
{

    /**Course Creation Routes **/
    Route::get("createcourse","CourseManagerController@createCourse");
    Route::post("store_course",['as'=>'store_course','uses'=>'CourseManagerController@storeCourse']);
    Route::get("course/{id}/createassignment", array('as'=>'id','uses'=>'AssignmentManagerController@createAssignment'));
    Route::get("course/{id}/roster",array('as'=>'id','uses'=>'CourseManagerController@managerRoster'));
    Route::get('course/{id}/roster/{student_id}',array('as'=>'id','uses'=>'CourseManagerController@editCourseRoster'));
    Route::get('course/{id}/mygradebook',array('as'=>'id','uses'=>'AssignmentManagerController@viewGradeBook'));
    Route::post('update_roster',"CourseManagerController@updateRoster");
    Route::get("myassignments/{id}/edit","AssignmentManagerController@editAssignment");
    Route::post('store_assignment',"AssignmentManagerController@storeAssignment");
    Route::post('update_assignment',"AssignmentManagerController@updateAssignment");
    Route::get('mygradebook/{id}/edit',"AssignmentManagerController@editGrade");
    Route::post('update_grade',"AssignmentManagerController@updateGrade");

});


Route::group(array('domain' => $domain,'middleware'=>'authorize','user_type'=>['App\Student']), function()
{

    /**Course Creation Routes **/
    Route::get("enrollincourse","CourseManagerController@enrollInCourse");
    Route::post("enrollment","CourseManagerController@enrollment");
    Route::get("course/{id}/submitassignment",array('as'=>'id','uses'=>'AssignmentManagerController@submitAssignment'));

});


Route::group(array('domain' => $domain,'middleware'=>'authorize','user_type'=>['App\Student','App\Teacher','App\Guardian','App\BusinessManager','App\Admin']), function(){

    Route::get("changepassword","HomeController@changePassword");
    Route::get("passwordchanged","HomeController@passwordChanged");
    Route::post("update_password","HomeController@updatePassword");
});


Route::group(array('domain' => $domain,'middleware'=>'authorize','user_type'=>['App\Student','App\Teacher','App\Guardian']), function(){

    Route::get("myredeemedrewards","PublicRewardController@viewMyRedeemedRewards");
    Route::get("myrewards","PublicRewardController@viewMyUnredeemedRewards");
    Route::post("redeem_reward","PublicRewardController@redeemReward");
    Route::get("viewcoupon/{id}","PublicRewardController@viewCoupon");

});



/**Authorization Routes **/
Route::controllers([
   'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
