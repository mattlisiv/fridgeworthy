<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::table('users', function ($table) {
            $table->foreign('school_id')
                ->references('id')
                ->on('schools');
        });

        Schema::table('grades', function ($table) {

            /**Foreign Key to Assignment**/
            $table->foreign('assignment_id')
                ->references('id')->on('assignments');
            $table->foreign('student_id')
                ->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('assignments', function ($table) {
            /**Foreign Key to Course **/
            $table->foreign('course_id')
                ->references('id')->on('courses');

        });

        Schema::table('coupons', function ($table) {

            /**Foreign key to user that has purchased coupon **/
            $table->foreign('user_id')
                ->references('id')->on('users');

            /**Foreign key to reward **/
            $table->foreign('reward_id')
                ->references('id')->on('rewards')
                ->onDelete('cascade');

        });

        Schema::table('courses', function ($table) {
            $table->foreign('teacher_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
        Schema::table('rewards', function ($table) {

            $table->foreign('business_id')
                ->references('id')->on('businesses')
                ->onDelete('cascade');
        });



        Schema::table('course_user',function($table){

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
