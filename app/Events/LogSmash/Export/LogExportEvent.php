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
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $method;

    /**
     * @var array
     */
    public $request;

    /**
     * LogExportEvent constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $type
     * @param string $method
     * @param array  $request
     * @noinspection DuplicatedCode
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $type,
        string $method,
        array $request
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->type        = $type;
        $this->method      = $method;
        $this->request     = $request;
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
            'type'        => $this->type,
            'method'      => $this->method,
            // By including each item in the request array separately we exclude the 'body' attribute as it is too large
            'request'     => [
                'method'   => $this->request['method'] ?? null,
                'target'   => $this->request['target'] ?? null,
                'uri'      => $this->request['uri'] ?? null,
                'headers'  => $this->request['headers'] ?? null,
                'protocol' => $this->request['protocol'] ?? null,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getBlobData(): array
    {
        return [
            'request' => $this->request,
        ];
    }
}
