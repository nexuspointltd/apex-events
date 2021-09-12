<?php

namespace Nexus\ApexEvents\Events\DataManager\Import;

use Nexus\ApexEvents\Events\AbstractEvent;

class MessageToStopStage01CollectionEvent extends AbstractEvent
{
    /**
     * @var string
     */
    public $tenantGuid;

    /**
     * MessageToStopStage01CollectionEvent constructor.
     *
     * @param string $tenantGuid The Tenant GUID String that this message refers to
     */
    public function __construct(string $tenantGuid)
    {
        $this->tenantGuid = $tenantGuid;
    }
}
