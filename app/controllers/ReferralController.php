<?php

use Cashout\Models\UserReferral;

class ReferralController extends BaseController {

    public function createNewReferrals(){

        return View::make('customer.referral.create_referral');
    }

    public function myReferrals(){

        $this->data['referrals'] = DB::table('user_referrals as ur')
                ->join('users as u','u.id','=','ur.user_id')
                ->where('ur.user_id','>',0)
                ->where('ur.referral_id','=',Auth::user()->id)
                ->select(['u.id as user_id','u.email','u.name','u.avatar','ur.created_at as referred_on','u.created_at as registered_on'])->get();

        return View::make('customer.referral.my_referrals',$this->data);
    }

    public function pendingReferrals(){

        $this->data['referrals'] = UserReferral::where('user_id','<=',0)
            ->where('referral_id','=',Auth::user()->id)
            ->get();

        return View::make('customer.referral.pending_referrals',$this->data);
    }

    public function storeNewReferrals(){
        if(Input::has('emails')){

            $emails = explode(',',Input::get('emails'));

            foreach($emails as $email){

                $referral = UserReferral::where('referral_id', Auth::user()->id)->where('email', $email)->first();

                if (sizeof($referral) > 0) {
                    //Send email if tries less than 3 else skip
                    if($referral->tries<5) {
                        $referral->tries = $referral->tries + 1;
                        $referral->save();
                    }else{
                        continue;
                    }
                } else {
                    $user_referral = new UserReferral();
                    $user_referral->user_id = 0;
                    $user_referral->referral_id = Auth::user()->id;
                    $user_referral->email = $email;
                    $user_referral->tries = 1;
                    $user_referral->save();
                }
            }

            Session::flash('success_msg','Referral email sent successfully');
            return Redirect::back();

        }else{
            Session::flash('error_msg','Please enter emails to sent referral email');
            return Redirect::back();
        }
    }

}
