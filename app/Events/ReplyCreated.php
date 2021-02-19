<?php

namespace App\Events;

use App\Reply;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReplyCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Reply
     */
    public $reply;
    public $user;

    /**
     * Create a new event instance.
     *
     * @param Reply $reply
     * @param $user
     */
    public function __construct(Reply $reply, $user)
    {
        $this->reply = $reply;
        $this->user = $user;
    }


}
