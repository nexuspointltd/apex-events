<?php

namespace Nexus\ApexEvents\Broadcasts;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

abstract class AbstractBroadcast implements ShouldBroadcast
{
    use InteractsWithSockets;
    use InteractsWithBroadcasting;
    use SerializesModels;

    /**
     * Override the broadcaster driver to use redis, as the trait's property cannot be overriden by the
     * implementing class.
     * @return string[]
     */
    public function broadcastConnections()
    {
        return ['redis'];
    }
}
