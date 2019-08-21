<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ScenarioException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('Error in scenario: ' . $message);
    }
}
