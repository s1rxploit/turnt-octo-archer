<?php

use Cashout\Models\UserReferral;

class ReferralController extends BaseController {

    function __construct(){
        parent::__construct();
    }

    public function getNewReferrals(){

        return View::make('backend.referral.create_referral');
    }

    public function myReferrals(){

        $this->data['referrals'] = DB::table('user_referrals as ur')
                ->join('users as u','u.id','=','ur.user_id')
                ->where('ur.user_id','>',0)
                ->where('ur.referral_id','=',Auth::user()->id)
                ->select(['u.id as user_id','u.email','u.name','u.avatar','ur.created_at as referred_on','u.created_at as registered_on'])->get();

        return View::make('backend.referral.my_referrals',$this->data);
    }

    public function pendingReferrals(){

        $this->data['referrals'] = UserReferral::where('user_id','<=',0)
            ->where('referral_id','=',Auth::user()->id)
            ->get();

        return View::make('backend.referral.pending_referrals',$this->data);
    }

    public function postNewReferrals(){
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

    public function trialPayResponse(){

        //dd(Input::all());

        $message_signature = Input::header('TrialPay-HMAC-MD5');

        // Recalculate the signature locally
        $key = Config::get('trial_pay.notification_key');

        $request = Request::instance();
        $HTTP_RAW_POST_DATA = $request->getContent();

        if(Input::get('user_id')=="sample-sid"){
            return 1;
        }

        if (Input::method() == 'POST') {

            // the following is for POST notification
            if (empty($HTTP_RAW_POST_DATA)) {
                $recalculated_message_signature = hash_hmac('md5', file_get_contents('php://input'), $key);
            } else {
                $recalculated_message_signature = hash_hmac('md5', $HTTP_RAW_POST_DATA, $key);
            }

        } else {
            // the following is for GET notification
            $recalculated_message_signature = hash_hmac('md5', $_SERVER['QUERY_STRING'], $key);
        }

        \Log::error("**********Message Signature ".$message_signature);
        \Log::error("**********Calculated Signature ".$recalculated_message_signature);

        if ($message_signature == $recalculated_message_signature) {

            \Log::error("**********Signature Match Successful");

            $user_id = Input::get('user_id');
            //$user_id = 1;

            \Log::error("**********Finding User ID ".$user_id);

            //user exists
            $user = User::where('id',$user_id)->first();

            if(sizeof($user)>0){

                \Log::error("**********User Found ".$user->name);

                //exists , increment coins and cash
                $user->coins = $user->coins + Input::get('reward_amount');
                $user->cash  = $user->cash + Input::get('reward');

                //Log the request
                $trial_pay_request = new TrialPayResponse();
                $trial_pay_request->user_id = Input::get('user_id');
                $trial_pay_request->email = Input::get('email');
                $trial_pay_request->country = Input::get('country');
                $trial_pay_request->zipcode = Input::get('zipcode');
                $trial_pay_request->reward_amount = Input::get('reward_amount');
                $trial_pay_request->oid = Input::get('oid');
                $trial_pay_request->revenue = Input::get('revenue');
                $trial_pay_request->trans_type = Input::get('trans_type');
                $trial_pay_request->offer_category = Input::get('offer_category');
                $trial_pay_request->order_date = Input::get('order_date');
                $trial_pay_request->product_id = Input::get('product_id');
                $trial_pay_request->traffic_source = Input::get('traffic_source');
                $trial_pay_request->product_price = Input::get('product_price');
                $trial_pay_request->save();

                $cgs = new \Cashout\Helpers\CGS();
                $cgs->sendReferralCoins(Input::get('user_id'),Input::get('reward_amount'),$trial_pay_request->id);

                return 1;

            }else{
                \Log::error("**********User Not Found ");
                //do nothing
                \Log::error("**********UNAUTHENTICATED SID-REQUEST FOUND");
            }

            \Log::error(Input::all());
        } else {
            \Log::error('Message not Authentic');
        }
        //check if user with that sid exists


        return 0;
    }

    public function setRewards($user_id,$reward_coins){

        $cgs = new \Cashout\Helpers\CGS();
        $cgs->sendReferralCoins($user_id,$reward_coins,0);

    }


}
