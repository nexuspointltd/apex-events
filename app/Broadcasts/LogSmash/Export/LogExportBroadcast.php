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
     * @var int
     */
    public $response_code;

    /**
     * @var string
     */
    public $response_body;

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
     * @param int $response_code
     * @param string $response_body
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
        int $response_code,
        string $response_body,
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
        $this->response_code    = $response_code;
        $this->response_body    = $response_body;
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
