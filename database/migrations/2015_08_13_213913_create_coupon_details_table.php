<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupon_details', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->integer('reward_id')->unsigned();
            $table->foreign('reward_id')->references('id')->on('rewards');
            $table->string('description');
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
		Schema::drop('coupon_details');
	}

}
