<?php

namespace Nexus\ApexEvents\Interfaces\Events;

interface LogSmashEventInterface
{
    public function getMetaData();

    public function getBlobData();
}
