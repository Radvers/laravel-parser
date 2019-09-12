<?php


namespace App\Exceptions;

class CriterionException extends \Exception
{
    public static function unknownAlias(string $alias)
    {
        return new self("couldn't build criterion by given alias: \"{$alias}\"");
    }
}
