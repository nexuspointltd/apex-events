<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\API;

use Nexus\ApexEvents\Broadcasts\AbstractBroadcast;

/**
 * Class LogApiResponseBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogApiResponseBroadcast extends AbstractBroadcast
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
     * @var array
     */
    public $responseData = [];

    /**
     * @var string|null
     */
    public $error = null;

    /**
     * LogApiResponseBroadcast constructor.
     * @param string      $tenantGuid
     * @param string      $tenantName
     * @param string      $tenantHostname
     * @param string      $className
     * @param array       $requestData
     * @param array|null  $responseData
     * @param string|null $error
     */
    public function __construct(
        string $tenantGuid,
        string $tenantName,
        string $tenantHostname,
        string $className,
        array $requestData = [],
        array $responseData = null,
        string $error = null
    ) {
        $this->tenantGuid     = $tenantGuid;
        $this->tenantName     = $tenantName;
        $this->tenantHostname = $tenantHostname;
        $this->className      = $className;
        $this->requestData    = $requestData;
        $this->responseData   = $responseData;
        $this->error          = $error;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['log-smash.api.' . $this->tenantGuid];
    }
}
