<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseUserPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_user', function(Blueprint $table)
		{
			$table->integer('course_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->enum('status',['unconfirmed','confirmed','suspended','declined']);
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_user');
	}

}
