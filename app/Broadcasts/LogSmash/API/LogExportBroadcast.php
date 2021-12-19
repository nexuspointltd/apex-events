<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\API;

use Nexus\ApexEvents\Broadcasts\AbstractBroadcast;

/**
 * Class LogExportBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogExportBroadcast extends AbstractBroadcast
{
    /**
     * @var string
     */
    public $guid;

    /**
     * @var string
     */
    public $environment;

    /**
     * @var string
     */
    public $timestamp;

    /**
     * @var array
     */
    public $tenant;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $method;

    /**
     * @var array
     */
    public $request;

    /**
     * LogExportBroadcast constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $type
     * @param string $method
     * @param array  $request
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $type,
        string $method,
        array $request
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->type        = $type;
        $this->method      = $method;
        $this->request     = $request;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['log-smash.api.' . $this->tenant['guid']];
    }
}
