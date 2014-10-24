<?php

use \Cashout\Models\Notifications;
use \Cashout\Models\News;

class AdminFinanceController extends BaseController {

    function __construct(){
        parent::__construct();
    }


    public function pendingWithdrawals(){

        $this->data['withdrawals'] = \Cashout\Models\Withdrawal::where('status',0)->paginate(20);

        foreach($this->data['withdrawals'] as $withdrawal){
            $user = \Cashout\Models\User::find($withdrawal->user_id);
            $withdrawal->user = $user;
        }

        return View::make("backend.finance.pending_withdrawals",$this->data);
    }

    public function approvedWithdrawals(){

        $this->data['withdrawals'] = \Cashout\Models\Withdrawal::where('status',1)->paginate(20);

        foreach($this->data['withdrawals'] as $withdrawal){
            $user = \Cashout\Models\User::find($withdrawal->user_id);
            $withdrawal->user = $user;
        }

        return View::make("backend.finance.approved_withdrawals",$this->data);
    }
} 