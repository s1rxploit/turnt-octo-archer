<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrialPayResponse extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('trial_pay_response', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('user_id');
            $table->string('email');
            $table->string('country');
            $table->string('zipcode');
            $table->string('reward_amount');
            $table->string('oid');
            $table->string('revenue');
            $table->string('trans_type');
            $table->string('offer_category');
            $table->string('order_date');
            $table->string('product_id');
            $table->string('traffic_source');
            $table->string('product_price');
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
		Schema::dropIfExists('trial_pay_response');
	}

}
