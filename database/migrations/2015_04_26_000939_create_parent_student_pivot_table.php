<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentStudentPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('parent_student', function(Blueprint $table)
        {
            $table->integer('parent_id')->unsigned()->index();
            $table->integer('student_id')->unsigned()->unique()->index();
            $table->enum('status',['unconfirmed','confirmed','flagged']);
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
