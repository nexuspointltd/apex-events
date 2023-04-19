<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\Vehicle;

use Nexus\ApexEvents\Broadcasts\AbstractLogsmashBroadcast;

/**
 * Class LogVehicleResponseBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogVehicleResponseBroadcast extends AbstractLogsmashBroadcast
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
    public $class;

    /**
     * @var string
     */
    public $identifier;

    /**
     * @var string
     */
    public $identifier_type;

    /**
     * @var array
     */
    public $request;

    /**
     * @var array|null
     */
    public $response;

    /**
     * @var array|null
     */
    public $error;

    /**
     * LogVehicleResponseBroadcast constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $class
     * @param string $identifier
     * @param string $identifier_type
     * @param array  $request
     * @param array|null $response
     * @param array|null $error
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $identifier,
        string $identifier_type,
        array $request,
        array $response = null,
        array $error = null
    ) {
        $this->guid             = $guid;
        $this->environment      = $environment;
        $this->timestamp        = $timestamp;
        $this->tenant           = $tenant;
        $this->class            = $class;
        $this->identifier       = $identifier;
        $this->identifier_type  = $identifier_type;
        $this->request          = $request;
        $this->response    = $response;
        $this->error       = $error;
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
