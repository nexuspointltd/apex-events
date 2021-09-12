<?php

namespace Nexus\ApexEvents\Broadcasts\DataManager\Import;

use Nexus\ApexEvents\Broadcasts\AbstractBroadcast;

class Stage02ExtractionFailedBroadcast extends AbstractBroadcast
{
    /**
     * @var string
     */
    public $tenantGuid;

    /**
     * Stage02ExtractionFailedEvent constructor.
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
