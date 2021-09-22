<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use Nexus\ApexEvents\Events\AbstractEvent;
use Nexus\ApexEvents\Interfaces\Events\LogSmashEventInterface;

/**
 * Class LogApiRequestEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogApiRequestEvent extends AbstractEvent implements LogSmashEventInterface
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
    public $class;

    /**
     * @var string
     */
    public $provider;

    /**
     * @var array
     */
    public $request;

    /**
     * LogApiRequestEvent constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $class
     * @param string $provider
     * @param array  $request
     * @noinspection DuplicatedCode
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $provider,
        array $request
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->class       = $class;
        $this->provider    = $provider;
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
            'class'       => $this->class,
            'provider'    => $this->provider,
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
