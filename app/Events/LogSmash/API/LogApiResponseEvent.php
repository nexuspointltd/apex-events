<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use Nexus\ApexEvents\Events\AbstractEvent;
use Nexus\ApexEvents\Interfaces\Events\LogSmashEventInterface;

/**
 * Class LogApiResponseEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogApiResponseEvent extends AbstractEvent implements LogSmashEventInterface
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
     * @var array|null
     */
    public $response;

    /**
     * @var array|null
     */
    public $error;

    /**
     * LogApiRequestEvent constructor.
     * @param string     $guid
     * @param string     $environment
     * @param string     $timestamp
     * @param array      $tenant
     * @param string     $class
     * @param string     $provider
     * @param array      $request
     * @param array|null $response
     * @param array|null $error
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $provider,
        array $request,
        array $response = null,
        array $error = null
    ) {
        $this->guid        = $guid;
        $this->environment = $environment;
        $this->timestamp   = $timestamp;
        $this->tenant      = $tenant;
        $this->class       = $class;
        $this->provider    = $provider;
        $this->request     = $request;
        $this->response    = $response;
        $this->error       = $error;
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
            'error'       => $this->error,
            'request'     => Arr::except($this->request, ['body']),
            'response'    => Arr::except($this->response, ['body']),
        ];
    }

    public function getBlobData()
    {
        return [
            'request'  => $this->request,
            'response' => $this->response,
        ];
    }
}
