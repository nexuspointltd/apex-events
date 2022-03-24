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
     * @return array
     */
    public function getMetaData(): array
    {
        return [
            'guid'        => $this->guid,
            'environment' => $this->environment,
            'timestamp'   => $this->timestamp,
            'tenant'      => $this->tenant,
            'export'      => $this->export,
            'status'      => $this->status,
            'message'     => $this->message,
        ];
    }

    /**
     * @return array
     */
    public function getBlobData(): array
    {
        return [];
    }
}
