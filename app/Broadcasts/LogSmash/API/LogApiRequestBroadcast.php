<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\API;

use Nexus\ApexEvents\Broadcasts\AbstractBroadcast;

/**
 * Class LogApiRequestBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogApiRequestBroadcast extends AbstractBroadcast
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
     * LogApiRequestBroadcast constructor.
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

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['logsmash.api.' . $this->tenantGuid];
    }
}
