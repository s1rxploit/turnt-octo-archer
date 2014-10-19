<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailUsersReferral extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('user_referrals', function(Blueprint $table)
        {
            $table->string('email');
            $table->integer('tries');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('user_referrals', function(Blueprint $table)
        {
            $table->dropColumn('email');
            $table->dropColumn('tries');
        });
	}

}
