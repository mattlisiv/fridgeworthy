<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCourseFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_files', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->string('filename');
            $table->string('file_path');

            $table->foreign('course_id')
                ->references('id')->on('courses');

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
		Schema::table('course_files', function(Blueprint $table)
		{

		});
	}

}
