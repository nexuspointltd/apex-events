<?php

namespace Nexus\ApexEvents\Events\LogSmash\API;

use DateTime;
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
     * @var DateTime
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
     * @param string   $guid
     * @param string   $environment
     * @param DateTime $timestamp
     * @param array    $tenant
     * @param string   $class
     * @param string   $provider
     * @param array    $request
     */
    public function __construct(
        string $guid,
        string $environment,
        DateTime $timestamp,
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
}
