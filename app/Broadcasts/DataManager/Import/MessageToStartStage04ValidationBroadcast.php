<?php

namespace Nexus\ApexEvents\Broadcasts\DataManager\Import;

use Nexus\ApexEvents\Broadcasts\AbstractBroadcast;

class MessageToStartStage04ValidationBroadcast extends AbstractBroadcast
{
    /**
     * @var string
     */
    public $tenantGuid;

    /**
     * MessageToStartStage04ValidationEvent constructor.
     *
     * @param string $tenantGuid The Tenant GUID String that this message refers to
     */
    public function __construct(string $tenantGuid)
    {
        $this->tenantGuid = $tenantGuid;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['datamanager.import.' . $this->tenantGuid];
    }
}
