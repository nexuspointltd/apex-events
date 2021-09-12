<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use Nexus\ApexEvents\Events\AbstractEvent;
use Nexus\ApexEvents\Interfaces\Events\LogSmashEventInterface;

/**
 * Class LogApiRequestEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogApiRequestEvent extends AbstractEvent implements LogSmashEventInterface
{
    /**
     * @var string
     */
    public $tenantGuid;

    /**
     * @var string
     */
    public $tenantName;

    /**
     * @var string
     */
    public $tenantHostname;

    /**
     * @var string
     */
    public $className;

    /**
     * @var array
     */
    public $requestData = [];

    /**
     * LogApiRequestEvent constructor.
     * @param string $tenantGuid
     * @param string $tenantName
     * @param string $tenantHostname
     * @param string $className
     * @param array  $requestData
     */
    public function __construct(
        string $tenantGuid,
        string $tenantName,
        string $tenantHostname,
        string $className,
        array $requestData = []
    ) {
        $this->tenantGuid     = $tenantGuid;
        $this->tenantName     = $tenantName;
        $this->tenantHostname = $tenantHostname;
        $this->className      = $className;
        $this->requestData    = $requestData;
    }
}
