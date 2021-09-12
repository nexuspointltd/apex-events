<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use Illuminate\Support\Arr;
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
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $provider,
        array $request
    )
    {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->class       = $class;
        $this->provider    = $provider;
        $this->request     = $request;
    }

    public function getMetaData()
    {
        return [
            'guid'        => $this->guid,
            'environment' => $this->environment,
            'timestamp'   => $this->timestamp,
            'tenant'      => $this->tenant,
            'class'       => $this->class,
            'provider'    => $this->provider,
            'request'     => Arr::except($this->request, ['body']),
        ];
    }

    public function getBlobData()
    {
        return [
            'request' => $this->request,
        ];
    }
}
