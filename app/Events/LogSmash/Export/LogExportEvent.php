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
    public $model_type;

    /**
     * @var string
     */
    public $model_id;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $dealer_id;

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
        string $model_type,
        string $model_id,
        string $method,
        string $type,
        string $dealer_id,
        array $tenant
    ) {
        $this->guid             = $guid;
        $this->environment      = $environment;
        $this->timestamp        = $timestamp;
        $this->model_type       = $model_type;
        $this->model_id         = $model_id;
        $this->method           = $method;
        $this->type             = $type;
        $this->dealer_id        = $dealer_id;
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
            'model_type'    => $this->model_type,
            'model_id'      => $this->model_id,
            'method'        => $this->method,
            'type'          => $this->type,
            'dealer_id'     => $this->dealer_id,
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
