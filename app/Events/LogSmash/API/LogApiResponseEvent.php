<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use Nexus\ApexEvents\Events\AbstractEvent;

/**
 * Class LogApiResponseEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogApiResponseEvent extends AbstractEvent
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
     * LogApiResponseEvent constructor.
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
}
