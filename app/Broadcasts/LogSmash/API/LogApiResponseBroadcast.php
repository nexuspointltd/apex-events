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
    public $provider;

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
     * LogApiRequestEvent constructor.
     * @param string     $guid
     * @param string     $environment
     * @param string     $timestamp
     * @param array      $tenant
     * @param string     $class
     * @param string     $provider
     * @param array      $request
     * @param array|null $response
     * @param array|null $error
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $provider,
        array $request,
        array $response = null,
        array $error = null
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->class       = $class;
        $this->provider    = $provider;
        $this->request     = $request;
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
