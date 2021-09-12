<?php

namespace Nexus\ApexEvents\Events\DataManager\Import;

use Nexus\ApexEvents\Events\AbstractEvent;

class Stage02ExtractionFailedEvent extends AbstractEvent
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
}
