<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReferralCoinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('user_referral_coins', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('referral_id');
            $table->integer('user_id');
            $table->integer('coins_earned');
            $table->integer('trial_pay_response_id');
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
		Schema::dropIfExists("user_referral_coins");
	}

}
