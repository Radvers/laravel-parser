<?php


namespace App\Exceptions;


use Throwable;

class ParserException extends \Exception
{
    public function __construct()
    {
        parent::__construct("You trying to extract data from empty response. Send request before.");
    }
}
