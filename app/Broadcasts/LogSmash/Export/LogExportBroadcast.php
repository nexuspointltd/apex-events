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
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $rows_exported;

    /**
     * @var string
     */
    public $details;

    /**
     * @var string
     */
    public $finished_at;

    /**
     * @var array
     */
    public $tenant;

    /**
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param string $status
     * @param int $rows_exported
     * @param string $details
     * @param string $finished_at
     * @param array $tenant
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        string $status = null,
        int $rows_exported = null,
        string $details = null,
        string $finished_at = null,
        array $tenant
    ) {
        $this->guid             = $guid;
        $this->environment      = $environment;
        $this->timestamp        = $timestamp;
        $this->status           = $status;
        $this->rows_exported    = $rows_exported;
        $this->details          = $details;
        $this->finished_at      = $finished_at;
        $this->tenant           = $tenant;
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
