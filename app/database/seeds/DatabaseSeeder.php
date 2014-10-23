<?php

use Cashout\Models\User;
use Cashout\Models\UserReferral;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Cashout\Helpers\Utils;

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

        $password = Hash::make('311311');

        $user = new User();
        $user->name = "Imran Iqbal";
        $user->email = "shellprog@gmail.com";
        $user->password = $password;
        $user->referral_code = Utils::generateReferralCode();
        $user->activated = 1;
        $user->save();

        $user_groups = new \Cashout\Models\UsersGroups();
        $user_groups->group_id=2;
        $user_groups->user_id=$user->id;
        $user_groups->save();

        $user = new User();
        $user->name = "Imran Iqbal";
        $user->email = "vjx242@gmail.com";
        $user->password = $password;
        $user->referral_code = Utils::generateReferralCode();
        $user->activated = 1;
        $user->save();

        $user_groups = new \Cashout\Models\UsersGroups();
        $user_groups->group_id=2;
        $user_groups->user_id=$user->id;
        $user_groups->save();

        $this->command->info("Created Admins Vincent and Imran ....");

        for($i=1;$i<20;$i++){
            $user = new User();
            $user->name = "User $i";
            $user->email = "user$i@gmail.com";
            $user->password = $password;
            $user->referral_code = Utils::generateReferralCode();
            $user->activated = 1;
            $user->save();

            $user_groups = new \Cashout\Models\UsersGroups();
            $user_groups->group_id=1;
            $user_groups->user_id=$user->id;
            $user_groups->save();

            $this->command->info("User $i ....");
        }

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
