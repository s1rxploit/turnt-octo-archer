<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_withdrawal_request', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('amount');
            $table->string('paypal_email');
            $table->boolean('status');
            $table->integer('approved_by_admin_id');
            $table->date('approved_on');
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
		Schema::dropIfExists('user_withdrawal_request');
	}

}
