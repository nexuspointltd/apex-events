<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\API;

use Nexus\ApexEvents\Broadcasts\AbstractBroadcast;

/**
 * Class LogAppImageStoreRequestBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogAppImageStoreRequestBroadcast extends AbstractBroadcast
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
    public $name;

    /**
     * @var string
     */
    public $size;

    /**
     * @var array
     */
    public $request;

    /**
     * LogAppImageStoreRequestBroadcast constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $name
     * @param string $size
     * @param array  $request
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $name,
        string $size,
        array $request
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->name        = $name;
        $this->size        = $size;
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
