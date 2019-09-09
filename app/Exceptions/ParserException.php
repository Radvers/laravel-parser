<?php

namespace App\Exceptions;

use Throwable;

class ParserException extends \Exception
{
    public static function emptyResponse()
    {
        return new self("You trying to extract data from empty response. Send request before.");
    }
}
