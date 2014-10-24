<?php

use \Cashout\Models\Notifications;
use \Cashout\Models\News;

class FinanceController extends BaseController {

    public function getWithdraw(){
        return View::make("backend.finance.withdraw");
    }

    public function getAllWithdrawalsRequest(){

        $this->data['withdrawals'] = \Cashout\Models\Withdrawal::where('user_id',Auth::user()->id)->paginate(20);

        return View::make("backend.finance.all_withdrawals",$this->data);
    }

    public function postWithdraw(){

        $paypal_email = Input::get("paypal_email");
        $amount = Input::get("amount");

        $v = Validator::make(Input::all(),['paypal_email'=>'required|email','amount'=>"required"]);

        if($v->fails()){
            Session::flash('error_msg',$v->messages()->all());
            return Redirect::back()->withInput(Input::all());
        }

        if($amount > Auth::user()->cash){
            Session::flash('error_msg','Unable to withdraw funds , withdrawal amount higher than available balance ');
            return Redirect::back();
        }

        for($i=0;$i<50;$i++) {
            $withdrawal_request = new \Cashout\Models\Withdrawal();
            $withdrawal_request->user_id = Auth::user()->id;
            $withdrawal_request->amount = $amount;
            $withdrawal_request->paypal_email = $paypal_email;
            $withdrawal_request->status = 0;
            $withdrawal_request->approved_by_admin_id = 0;
            $withdrawal_request->save();
        }

        Session::flash('success_msg','Withdrawal request successfully sent');
        return Redirect::to("/withdraw_funds/all");

    }
} 