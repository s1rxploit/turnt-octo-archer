<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertGroupsData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$groups = new \KodeInfo\UserManagement\Models\Groups();
        $groups->name="customer";
        $groups->permissions="";
        $groups->save();

        $groups = new \KodeInfo\UserManagement\Models\Groups();
        $groups->name="admin";
        $groups->permissions="";
        $groups->save();
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\KodeInfo\UserManagement\Models\Groups::truncate();
	}

}
