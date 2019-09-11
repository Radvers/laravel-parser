<?php

namespace App\Utils\DTO;

abstract class DTO
{
    /**
     * extract dto fields to array
     * @return array
     */
    abstract public function extractToArray(): array;

    /**
     * By this key data will be found in data storage
     * @return string
     */
    abstract public function getKey(): string;
}
