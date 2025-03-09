<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $recipient;

    public function __construct($message, $recipient)
    {
        $this->message = $message;
        $this->recipient = $recipient;
    }

    public function broadcastOn()
    {
        return new Channel('user.' . $this->recipient);
    }

    public function broadcastAs()
    {
        return 'new.message';
    }
} 