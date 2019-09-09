<?php

namespace App\Exceptions;

class SourceException extends \Exception
{
    public static function unknownSource(string $host)
    {
        return new self("Source: \"{$host}\" doesn't support");
    }
}
