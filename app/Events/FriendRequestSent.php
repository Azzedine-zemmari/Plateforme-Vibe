<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FriendRequestSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $userId;
    public $freindId;

    /**
     * Create a new event instance.
     */
    public function __construct($userId,$freindId)
    {
        $this->userId = $userId;
        $this->freindId = $freindId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('friend-request.' . $this->freindId)
        ];
    }
    public function broadcastWith()
    {
        return [
            'user_id' => $this->userId,
            'friend_id' => $this->freindId,
            'message' => 'You have a new friend request!',
        ];
    }
}
