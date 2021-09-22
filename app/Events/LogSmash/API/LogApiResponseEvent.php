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
     * @noinspection DuplicatedCode
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
            'error'       => $this->error,
            // By including each item in the request array separately we exclude the 'body' attribute as it is too large
            'request'     => [
                'method'   => $this->request['method'] ?? null,
                'target'   => $this->request['target'] ?? null,
                'uri'      => $this->request['uri'] ?? null,
                'headers'  => $this->request['headers'] ?? null,
                'protocol' => $this->request['protocol'] ?? null,
            ],
            // By including each item in the response array separately we exclude the 'body' attribute as it is too large
            'response'    => [
                'reason_phrase' => $this->response['reason_phrase'] ?? null,
                'status'        => $this->response['status'] ?? null,
                'headers'       => $this->response['headers'] ?? null,
                'protocol'      => $this->response['protocol'] ?? null,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getBlobData(): array
    {
        return [
            'request'  => $this->request,
            'response' => $this->response,
        ];
    }
}
