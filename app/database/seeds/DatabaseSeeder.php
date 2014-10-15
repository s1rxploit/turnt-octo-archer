<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Utils;
use App\Models\UserReferral;

class DatabaseSeeder extends Seeder
{

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
        DB::table('users')->insert([
            'name' => 'Dave',
            'username' => 'dave',
            'email' => 'dave@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Dave ....');

        DB::table('users')->insert([
            'name' => 'Bob',
            'username' => 'bob',
            'email' => 'bob@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Bob ....');

        DB::table('users')->insert([
            'name' => 'Jim',
            'username' => 'jim',
            'email' => 'jim@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Jim ....');

        DB::table('users')->insert([
            'name' => 'Joe',
            'username' => 'joe',
            'email' => 'joe@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Joe ....');

        DB::table('users')->insert([
            'name' => 'Jack',
            'username' => 'jack',
            'email' => 'jack@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Jack ....');

        DB::table('users')->insert([
            'name' => 'Mitch',
            'username' => 'mitch',
            'email' => 'mitch@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Mitch ....');

        DB::table('users')->insert([
            'name' => 'David',
            'username' => 'david',
            'email' => 'david@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('David ....');

        DB::table('users')->insert([
            'name' => 'Paul',
            'username' => 'paul',
            'email' => 'paul@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Paul ....');

        DB::table('users')->insert([
            'name' => 'Rauf',
            'username' => 'rauf',
            'email' => 'rauf@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Rauf ....');

        DB::table('users')->insert([
            'name' => 'Salim',
            'username' => 'salim',
            'email' => 'salim@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Salim ....');

        DB::table('users')->insert([
            'name' => 'Imran',
            'username' => 'imran',
            'email' => 'imran@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Imran ....');

        DB::table('users')->insert([
            'name' => 'Irfan',
            'username' => 'irfan',
            'email' => 'irfan@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Irfan ....');

        DB::table('users')->insert([
            'name' => 'Vincent',
            'username' => 'vincent',
            'email' => 'vincent@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Vincent ....');

        DB::table('users')->insert([
            'name' => 'Kenny',
            'username' => 'kenny',
            'email' => 'kenny@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Kenny ....');

        DB::table('users')->insert([
            'name' => 'Karen',
            'username' => 'karen',
            'email' => 'karen@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Karen ....');

        DB::table('users')->insert([
            'name' => 'Cris',
            'username' => 'cris',
            'email' => 'cris@gmail.com',
            'password' => Hash::make('311311'),
            'referral_code' => Utils::generateReferralCode(),
            'activated' => 1
        ]);

        $this->command->info('Cris ....');

        $this->command->info('Seeding referrals ....');

        $user_referral = new UserReferral();
        $user_referral->referral_id = 1;
        $user_referral->user_id = 2;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 1;
        $user_referral->user_id = 3;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 2;
        $user_referral->user_id = 4;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 2;
        $user_referral->user_id = 5;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 3;
        $user_referral->user_id = 6;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 3;
        $user_referral->user_id = 7;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 4;
        $user_referral->user_id = 8;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 4;
        $user_referral->user_id = 9;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 5;
        $user_referral->user_id = 10;
        $user_referral->save();

        $user_referral = new UserReferral();
        $user_referral->referral_id = 5;
        $user_referral->user_id = 11;
        $user_referral->save();

        $this->command->info('Done ....');
    }

}
