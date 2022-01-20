<?php

namespace Nexus\ApexEvents\Events\LogSmash\Export;

use Nexus\ApexEvents\Events\AbstractEvent;
use Nexus\ApexEvents\Interfaces\Events\LogSmashEventInterface;

/**
 * Class LogExportEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogExportEvent extends AbstractEvent implements LogSmashEventInterface
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
    public $current_status;

    /**
     * @var string
     */
    public $final_status;

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
     * @param string $model_type
     * @param string $model_id
     * @param string $method
     * @param string $type
     * @param string $dealer_id
     * @param array $tenant
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        string $current_status,
        string $final_status,
        int $rows_exported,
        string $details,
        string $finished_at,
        array $tenant
    ) {
        $this->guid             = $guid;
        $this->environment      = $environment;
        $this->timestamp        = $timestamp;
        $this->current_status   = $current_status;
        $this->final_status     = $final_status;
        $this->rows_exported    = $rows_exported;
        $this->details          = $details;
        $this->finished_at      = $finished_at;
        $this->tenant           = $tenant;
    }

    /**
     * @return array
     */
    public function getMetaData(): array
    {
        return [
            'guid'          => $this->guid,
            'environment'   => $this->environment,
            'timestamp'     => $this->timestamp,
            'current_status'=> $this->current_status,
            'final_status'  => $this->final_status,
            'rows_exported' => $this->rows_exported,
            'details'       => $this->details,
            'finished_at'   => $this->finished_at,
            'tenant'        => $this->tenant
        ];
    }

    /**
     * @return array
     */
    public function getBlobData(): array
    {
        return [
        ];
    }
}
