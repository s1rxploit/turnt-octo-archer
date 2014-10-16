<?php

use KodeInfo\UserManagement\UserManagement;
use Cashout\Models\TrialPayResponse;
use Cashout\Models\User;

class TrialPayController extends Controller {

    public function process(){

        //dd(Input::all());

        $message_signature = Input::header('TrialPay-HMAC-MD5');

        // Recalculate the signature locally
        $key = Config::get('trial_pay.notification_key');

        $request = Request::instance();
        $HTTP_RAW_POST_DATA = $request->getContent();

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


} 