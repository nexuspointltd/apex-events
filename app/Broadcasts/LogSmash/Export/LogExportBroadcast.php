<?php

namespace Nexus\ApexEvents\Broadcasts\LogSmash\Export;

use Nexus\ApexEvents\Broadcasts\AbstractLogsmashBroadcast;

/**
 * Class LogExportBroadcast
 * @package Nexus\ApexEvents\Broadcasts\LogSmash
 */
class LogExportBroadcast extends AbstractLogsmashBroadcast
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
     * @var array
     */
    public $export;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $message;

    /**
     * @param string      $guid
     * @param string      $environment
     * @param string      $timestamp
     * @param array       $tenant
     * @param array|null  $export
     * @param string|null $status
     * @param string|null $message
     */
    public function __construct(
        string  $guid,
        string  $environment,
        string  $timestamp,
        array   $tenant,
        ?array  $export,
        ?string $status,
        ?string $message
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->export      = $export ?? [];
        $this->status      = $status ?? '';
        $this->message     = $message ?? '';
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
