<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use Nexus\ApexEvents\Events\AbstractEvent;
use Nexus\ApexEvents\Interfaces\Events\LogSmashEventInterface;

/**
 * Class LogAppImageStoreRequestEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogAppImageStoreRequestEvent extends AbstractEvent implements LogSmashEventInterface
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
    public $name;

    /**
     * @var string
     */
    public $size;

    /**
     * @var array
     */
    public $request;

    /**
     * LogAppImageStoreRequestEvent constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $name
     * @param string $size
     * @param array  $request
     * @noinspection DuplicatedCode
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $name,
        string $size,
        array $request
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->name        = $name;
        $this->size        = $size;
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
            'name'        => $this->name,
            'size'        => $this->size,
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
