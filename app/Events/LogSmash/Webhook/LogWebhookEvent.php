<?php

namespace Nexus\ApexEvents\Events\LogSmash\Webhook;

use Nexus\ApexEvents\Events\AbstractEvent;
use Nexus\ApexEvents\Interfaces\Events\LogSmashEventInterface;

/**
 * Class LogWebhookEvent
 * @package Nexus\ApexEvents\Events\LogSmash
 */
class LogWebhookEvent extends AbstractEvent implements LogSmashEventInterface
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
    public $identifier;

    /**
     * @var string
     */
    public $identifier_type;

    /**
     * @var array
     */
    public $request;

    /**
     * LogWebhookEvent constructor.
     * @param string $guid
     * @param string $environment
     * @param string $timestamp
     * @param array  $tenant
     * @param string $class
     * @param string $identifier
     * @param string $identifier_type
     * @param array  $request
     */
    public function __construct(
        string $guid,
        string $environment,
        string $timestamp,
        array $tenant,
        string $class,
        string $identifier,
        string $identifier_type,
        array $request
    ) {
        $this->guid             = $guid;
        $this->environment      = $environment;
        $this->timestamp        = $timestamp;
        $this->tenant           = $tenant;
        $this->class            = $class;
        $this->identifier       = $identifier;
        $this->identifier_type  = $identifier_type;
        $this->request          = $request;
    }

    /**
     * @return array
     */
    public function getMetaData(): array
    {
        return [
            'guid'              => $this->guid,
            'environment'       => $this->environment,
            'timestamp'         => $this->timestamp,
            'tenant'            => $this->tenant,
            'class'             => $this->class,
            'identifier'        => $this->identifier,
            'identifier_type'   => $this->identifier_type,
            'request'           => [
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
