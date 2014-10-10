<?php namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class MessageRepository
{

    protected $table = 'users';
    protected $hidden = [];

    public $dbprefix = '';
    public $user_table_name = 'users AS u';
    public $user_table_username = 'u.id';
    public $user_table_id = 'u.id';
    public $msg_status_unread = 0;
    public $msg_status_read = 1;
    public $msg_status_archived = 2;

    private function conversationExists($participants)
    {
        $message_id = DB::table('msg_threads')->where('participants',$participants)->pluck('message_id');

        return empty($message_id) ? false :$message_id;
    }

    private function threadExists($thread)
    {
        $threads =  DB::table('msg_threads')->where('message_id',$thread)->get();

        return empty($threads) ? false : true;
    }

    function sendNewMessage($sender_id, $recipients, $body, $priority = 'normal',$thread_id = 0)
    {
        $recipients = is_array($recipients) ? $recipients : [$recipients];

        $all_participants = $recipients;
        $all_participants[] = $sender_id;
        sort($all_participants);
        $party_string = implode(',',$all_participants);

        if (($thread_id && $this->threadExists($thread_id)) || $thread_id = $this->conversationExists($party_string))
        {
            return $this->replyToMessage(0,$sender_id,$body,$thread_id);
        }
        else
        {
            DB::transaction(function() use ($sender_id, $recipients, $body, $priority,$party_string)
            {
                $subject = substr($body,0,15); // set subject to first 15 chars

                $thread_id = DB::table('msg_threads')->insertGetId(['subject'=>$subject,'participants'=>$party_string]);
                $threads = DB::table('msg_threads')->get();

                $msg_id = DB::table('msg_messages')->insertGetId(['thread_id'=>$thread_id, 'sender_id'=>$sender_id, 'body'=>$body, 'priority'=>$priority]);

                // Create batch inserts
                $participants[] = array('thread_id' => $thread_id,'user_id' => $sender_id);
                $statuses[]     = array('message_id' => $msg_id, 'user_id' => $sender_id,'status' => $this->msg_status_read);

                if ( ! is_array($recipients))
                {
                    $participants[] = array('thread_id' => $thread_id,'user_id' => $recipients);
                    $statuses[]     = array('message_id' => $msg_id, 'user_id' => $recipients, 'status' => $this->msg_status_unread);
                }
                else
                {
                    foreach ($recipients as $recipient)
                    {
                        $participants[] = array('thread_id' => $thread_id,'user_id' => $recipient);
                        $statuses[]     = array('message_id' => $msg_id, 'user_id' => $recipient, 'status' => $this->msg_status_unread);
                    }
                }

                $this->insertParticipants($participants);

                $this->insertStatuses($statuses);

                return $thread_id;

            });
        }
    }

    // ------------------------------------------------------------------------

    function replyToMessage($reply_msg_id,$sender_id,$body,$thread_id = 0,$priority = 'normal')
    {
        if ($thread_id == 0)
        {
            if ( ! $thread_id = $this->getThreadIdFromMessage($reply_msg_id))
            {
                return 'Thread does not exist';
            }
        }
        $valid = $this->isValidParticipant($thread_id,$sender_id);

        if(!$valid)
        {
            return 'You cannot send to this conversation';
        }

        DB::transaction(function() use ($sender_id, $body, $priority, $thread_id)
        {
            // Add this message
            $msg_id = $this->insertMessage($thread_id, $sender_id, $body, $priority);

            if ($recipients = $this->getThreadParticipants($thread_id, $sender_id))
            {
                $statuses[] = array('message_id' => $msg_id, 'user_id' => $sender_id,'status' => $this->msg_status_read);

                foreach ($recipients as $recipient)
                {
                    $statuses[] = array('message_id' => $msg_id, 'user_id' => $recipient->user_id, 'status' => $this->msg_status_unread);
                }

                $this->insertStatuses($statuses);
            }
        });

        return 'Message sent';
    }

    // ------------------------------------------------------------------------

    function getMessage($msg_id,$user_id)
    {
        $sql = 'SELECT m.*, s.status, t.subject, ' . $this->user_table_username .
            ' FROM ' . $this->dbprefix . 'msg_messages m ' .
            ' JOIN ' . $this->dbprefix . 'msg_threads t ON (m.thread_id = t.message_id) ' .
            ' JOIN ' . $this->dbprefix . $this->user_table_name . ' ON (' . $this->user_table_id . ' = m.sender_id) '.
            ' JOIN ' . $this->dbprefix . 'msg_status s ON (s.message_id = m.id AND s.user_id = ? ) ' .
            ' WHERE m.id = ? ' ;

        return DB::select($sql, array($user_id, $msg_id));
    }

    // ------------------------------------------------------------------------

    function getFullThread($thread_id,$user_id,$full_thread = 0)
    {
        $order_by = 'ASC';

        $sql = 'SELECT m.*, s.status, t.subject, '.$this->user_table_username .
            ' FROM ' . $this->dbprefix . 'msg_participants p ' .
            ' JOIN ' . $this->dbprefix . 'msg_threads t ON (t.message_id = p.thread_id) ' .
            ' JOIN ' . $this->dbprefix . 'msg_messages m ON (m.thread_id = t.message_id) ' .
            ' JOIN ' . $this->dbprefix . $this->user_table_name . ' ON (' . $this->user_table_id . ' = m.sender_id) '.
            ' JOIN ' . $this->dbprefix . 'msg_status s ON (s.message_id = m.id AND s.user_id = ? ) ' .
            ' WHERE p.user_id = ? ' .
            ' AND p.thread_id = ? ';

        if ( ! $full_thread)
        {
            $sql .= ' AND m.cdate >= p.cdate';
        }

        $sql .= ' ORDER BY m.cdate ' . $order_by;

        return DB::select($sql, array($user_id, $user_id, $thread_id));
    }

    // ------------------------------------------------------------------------

    function getAllThreads($user_id,$full_thread = 0)
    {
        $order_by = 'ASC';

        $sql = 'SELECT m.*, s.status, t.subject, '.$this->user_table_username .
            ' FROM ' . $this->dbprefix . 'msg_participants p ' .
            ' JOIN ' . $this->dbprefix . 'msg_threads t ON (t.message_id = p.thread_id) ' .
            ' JOIN ' . $this->dbprefix . 'msg_messages m ON (m.thread_id = t.message_id) ' .
            ' JOIN ' . $this->dbprefix . $this->user_table_name . ' ON (' . $this->user_table_id . ' = m.sender_id) '.
            ' JOIN ' . $this->dbprefix . 'msg_status s ON (s.message_id = m.id AND s.user_id = ? ) ' .
            ' WHERE p.user_id = ? ' ;

        if (!$full_thread)
        {
            $sql .= ' AND m.cdate >= p.cdate';
        }

        $sql .= ' ORDER BY t.message_id ' . $order_by. ', m.cdate '. $order_by;

        return DB::select($sql, array($user_id, $user_id));
    }

    // ------------------------------------------------------------------------

    function updateMessageStatus($msg_id,$user_id,$status_id)
    {
        return DB::table('msg_status')->
        where('message_id','=',$msg_id)->
        where('user_id','=',$user_id)->
        update(array('status' => $status_id ));
    }

    // ------------------------------------------------------------------------

    function addParticipant($thread_id,$user_id)
    {
        DB::transaction(function() use ($thread_id, $user_id)
        {
            $participants[] = array('thread_id' => $thread_id,'user_id' => $user_id);

            $this->insertParticipants($participants);

            // Get Messages by Thread
            $messages = $this->getMessagesByThreadId($thread_id);

            foreach ($messages as $message)
            {
                $statuses[] = array('message_id' => $message['id'], 'user_id' => $user_id, 'status' => $this->msg_status_unread);
            }

            $this->insertStatuses($statuses);
        });
    }

    // ------------------------------------------------------------------------

    function removeParticipant($thread_id,$user_id)
    {
        if($this->isValidParticipant($thread_id,$user_id))
        {
            DB::transaction(function() use ($thread_id, $user_id)
            {
                $this->deleteParticipant($thread_id, $user_id);
                $this->deleteStatuses($thread_id, $user_id);
            });
            return "Participant removed";
        }

        return "Not a part of this conversation";
    }

    // ------------------------------------------------------------------------

    public function isValidParticipant($thread_id, $user_id)
    {
        $sql = 'SELECT COUNT(*) AS count ' .
            ' FROM ' . $this->dbprefix . 'msg_participants p ' .
            ' WHERE p.thread_id = ? ' .
            ' AND p.user_id = ? ';

        $result = DB::table($this->dbprefix . 'msg_participants AS p ')
            ->where('p.thread_id','=',$thread_id)
            ->where('p.user_id','=',$user_id)
            ->count();

        if ($result)
        {
            return TRUE;
        }

        return FALSE;
    }

    // ------------------------------------------------------------------------

//    public function application_user($user_id)
//    {
//        $sql = 'SELECT COUNT(*) AS count ' .
//            ' FROM ' . $this->dbprefix . $this->user_table_name .
//            ' WHERE ' . $this->user_table_id . ' = ?' ;
//
//        $query = DB::select($sql, array($user_id));
//
//        sizeof($query) > 0 ? true : false;
//    }

    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------

    function getMsgCount($user_id)
    {

        return DB::table('msg_status')->select("*")->
        where('user_id', '=', $user_id)->where('status', '=', $this->msg_status_unread)->count();
    }

    // ------------------------------------------------------------------------
    // Private Functions from here out!
    // ------------------------------------------------------------------------

    private function insertThread($subject)
    {
        return DB::table('msg_threads')->insertGetId(array('subject' => $subject));
    }

    private function insertMessage($thread_id, $sender_id, $body, $priority)
    {
        $insert['thread_id'] = $thread_id;
        $insert['sender_id'] = $sender_id;
        $insert['body']      = $body;
        $insert['priority']  = $priority;
        return DB::table('msg_messages')->insertGetId($insert);
    }

    private function insertParticipants($participants)
    {

        return DB::table('msg_participants')->insert($participants);
    }

    private function insertStatuses($statuses)
    {
        return DB::table('msg_status')->insert($statuses);
    }

    private function getThreadIdFromMessage($msg_id)
    {
        $result = DB::table('msg_messages')->select('id')->where('id', '=', $msg_id)->get();
        return sizeof($result) == 0 ? 0 : $result[0];
    }

    private function getMessagesByThreadId($thread_id)
    {
        return DB::table('msg_messages')->select('*')->where('thread_id', '=', $thread_id)->get();
    }

    private function getThreadParticipants($thread_id, $sender_id = 0)
    {
        $query = DB::table('msg_participants')
            ->join($this->user_table_name, 'msg_participants.user_id', '=', $this->user_table_id)
            ->select('msg_participants.user_id', $this->user_table_username)
            ->where('thread_id', '=', $thread_id);
        if ($sender_id) // If $sender_id 0, no one to exclude
        {
            $query->where('msg_participants.user_id', '!=', $sender_id);
        }
        return $query->get();
    }

    private function deleteParticipant($thread_id, $user_id)
    {
        $pass1 = DB::table('msg_participants')->where('thread_id', '=', $thread_id)->where('user_id', '=', $user_id)->delete();
        $users_string = DB::table('msg_threads')->where('message_id',$thread_id)->pluck('participants');
        $users = explode(',',$users_string);
        if(($key = array_search($user_id, $users)) !== false) {
            unset($users[$key]);
        }
        $user_string = implode(',',$users);
        DB::table('msg_threads')->where('message_id',$thread_id)->update(['participants'=>$user_string]);

    }

    private function deleteStatuses($thread_id, $user_id)
    {
        $sql = 'DELETE s FROM msg_status s ' .
            ' JOIN ' . $this->dbprefix . 'msg_messages m ON (m.id = s.message_id) ' .

            ' WHERE m.thread_id = ? ' .
            ' AND s.user_id = ? ';
        DB::delete($sql,array($thread_id, $user_id));


    }
}