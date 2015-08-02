<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupon_images', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('coupon_id')->unsigned();
            $table->string('file_path');

            $table->foreign('coupon_id')
                ->references('id')->on('coupons');

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
		Schema::drop('coupon_images');
	}

}
