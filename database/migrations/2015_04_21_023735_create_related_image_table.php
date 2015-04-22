<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('related_images', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('reward_id')->unsigned();
            $table->string('file_path');

            $table->foreign('reward_id')
                ->references('id')->on('rewards');

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
		Schema::drop('related_images');
	}

}
