<?php

namespace Nexus\ApexEvents\Interfaces\Events;

interface LogSmashEventInterface
{
    /**
     * @return array
     */
    public function getMetaData(): array;

    /**
     * @return array
     */
    public function getBlobData(): array;
}
