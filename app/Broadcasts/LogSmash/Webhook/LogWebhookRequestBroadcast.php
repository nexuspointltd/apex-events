<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\Webhook;

use Nexus\ApexEvents\Broadcasts\AbstractLogsmashBroadcast;

/**
 * Class LogWebhookRequestBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogWebhookRequestBroadcast extends AbstractLogsmashBroadcast
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
     * LogWebhookRequestBroadcast constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $class
     * @param string $identifier
     * @param string $identifier_type
     * @param array  $request
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $identifier,
        string $identifier_type,
        array $request
    ) {
        $this->guid             = $guid;
        $this->environment      = $environment;
        $this->timestamp        = $timestamp;
        $this->tenant           = $tenant;
        $this->class            = $class;
        $this->identifier       = $identifier;
        $this->identifier_type  = $identifier_type;
        $this->request          = $request;
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
