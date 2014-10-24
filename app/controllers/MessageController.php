<?php

use Cashout\Repositories\MessageRepository;

class MessageController extends BaseController
{

    public $repo, $pusher, $channel;

    function __construct(){

        $this->repo = new MessageRepository();
        $this->pusher = new Pusher($this->data['site_config']->pusher_app_key, $this->data['site_config']->pusher_app_secret, $this->data['site_config']->pusher_app_id);
        $this->channel = "user-" . Auth::user()->id;

        parent::__construct();
    }

    public function sendMessage()
    {

        // Sanitize first?
        $sender_id = Input::get('sender_id');
        $recipients = Input::get('recipients');
        $body = Input::get('body');
        $priority = Input::get('priority', 'normal');
        $thread = Input::get('thread_id');


        foreach ($recipients as $recipient) {
            $pusher_arr = ['sender_id' => $sender_id, 'recipient' => $recipient, 'message' => $body, 'priority' => $priority, 'thread' => $thread];

            $this->pusher->trigger($this->channel, "message_sent", json_encode($pusher_arr), null, false, true);
        }

        return $this->repo->sendNewMessage($sender_id, $recipients, $body, $priority, $thread);
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



