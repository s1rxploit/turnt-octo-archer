<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBirthdayType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('birthday');
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->string('birthday');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('birthday');
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->date('birthday');
        });
	}

}
