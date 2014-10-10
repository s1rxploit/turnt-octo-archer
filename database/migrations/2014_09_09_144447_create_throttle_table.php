<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThrottleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('throttle', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->string('ip_address');
            $table->integer('attempts');
            $table->enum('suspended',[0,1])->default(0);
            $table->enum('banned',[0,1])->default(0);
			$table->dateTime('last_attempt_at');
			$table->dateTime('suspended_at');
			$table->dateTime('banned_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('throttle');
	}

}
