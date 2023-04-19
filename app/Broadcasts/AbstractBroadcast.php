<?php

namespace Nexus\ApexEvents\Broadcasts;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

abstract class AbstractBroadcast implements ShouldBroadcast
{
    use InteractsWithSockets;
    use SerializesModels;

    public function broadcastQueue()
    {
        return config('queue.prefix') . 'logsmash';
    }
}
