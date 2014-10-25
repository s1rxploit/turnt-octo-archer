<?php

use Cashout\Repositories\MessageRepository;

class MessageController extends BaseController
{

    public $repo, $pusher, $channel;

    function __construct(){

        parent::__construct();

        $this->repo = new MessageRepository();
        $this->pusher = new Pusher($this->data['site_config']->pusher_app_key, $this->data['site_config']->pusher_app_secret, $this->data['site_config']->pusher_app_id);
        $this->channel = "user-" . Auth::user()->id;

    }

    public function allMessages(){

        $cgs = new \Cashout\Helpers\CGS();
        $this->data['users'] = $cgs->getAllContacts(Auth::user()->id);

        if(sizeof($this->data['users'])>0){
            $this->data['thread'] = $this->repo->getAllThreads($this->data['users'][0]->id,true);
        }

        return View::make('backend.messages',$this->data);
    }

    public function getMessagesByThread($user_id){
        if($user_id>0){
            return json_encode($this->repo->getAllThreads($user_id,true));
        }
    }

    public function sendMessage()
    {

        // Sanitize first?
        $sender_id = Auth::user()->id;
        $recipient_id = Input::get('recipient_id');
        $body = Input::get('body');
        $priority = Input::get('priority', 'normal');
        $thread = Input::get('thread_id');

        $pusher_arr = ['sender_id' => $sender_id, 'recipient' => [$recipient_id], 'message' => $body, 'priority' => $priority, 'thread' => $thread];

        $this->pusher->trigger($this->channel, "message_sent", json_encode($pusher_arr), null, false, true);

        return $this->repo->sendNewMessage($sender_id, [$recipient_id], $body, $priority, $thread);
    }

    public function getMessage($user, $message)
    {
        return $this->repo->getMessage($message, $user);
    }

    public function removeFromConversation($user, $thread)
    {
        return $this->repo->removeParticipant($thread, $user);
    }

    public function getConversation($user, $thread)
    {
        return $this->repo->getFullThread($thread, $user, 1);
    }
}



