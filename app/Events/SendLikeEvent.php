<?php

namespace App\Events;

use App\Http\Resources\Message\MessageResource;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendLikeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        private readonly int $user_id,
        private readonly string $likeString,
    ) {
        //
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('send_like_' . $this->user_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'send_like';
    }

    public function broadcastWith(): array
    {
        return [
            'likeString' => $this->likeString
        ];
    }
}
