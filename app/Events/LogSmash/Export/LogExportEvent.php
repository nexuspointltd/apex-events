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
     * LogExportEvent constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @noinspection DuplicatedCode
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
     * @return array
     */
    public function getMetaData(): array
    {
        return [
            'guid'        => $this->guid,
            'environment' => $this->environment,
            'timestamp'   => $this->timestamp,
            'tenant'      => $this->tenant
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
