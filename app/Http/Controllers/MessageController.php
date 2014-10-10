<?php namespace App\Http\Controllers;

use App\Repositories\MessageRepository;

class MessageController extends BaseController {

    function __construct()
    {
        $this->repo = new MessageRepository();
    }

   public function sendMessage(){
    // Sanitize first?
        $sender_id = Input::get('sender_id');
        $recipients = Input::get('recipients');
        $body = Input::get('body');
        $priority = Input::get('priority','normal');
        $thread = Input::get('thread_id');

        return $this->repo->sendNewMessage($sender_id,$recipients,$body,$priority,$thread);
    }

    public function getMessage($user,$message)
    {
        return $this->repo->getMessage($message,$user);
    }

    public function removeFromConversation($user,$thread)
    {
        return $this->repo->removeParticipant($thread,$user);
    }

    public function getConversation($user,$thread)
    {
        return $this->repo->getFullThread($thread,$user,1);
    }
}



