<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\Export;

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
     * LogExportBroadcast constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['log-smash.export.' . $this->tenant['guid']];
    }
}
