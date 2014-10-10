<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->addUsers();
    }

    private function addUsers()
    {
        User::create(array(
            'name' => 'Vincent St. Louis',
            'email' => 'vjx242@gmail.com',
            'password' => Hash::make('311311')
        ));
        User::create(array(
            'name' => 'MD Imran Iqbal',
            'email' => 'shellprog@gmail.com',
            'password' => Hash::make('311311')
        ));
    }

}
