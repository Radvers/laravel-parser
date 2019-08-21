<?php

namespace App\Exceptions;

use Throwable;

class ConfigException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Config file or config field doesn't exist");
    }
}
