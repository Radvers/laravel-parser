<?php

namespace App\Utils\Contracts;

interface ConfigLoader
{
    /**
     * @param string $key
     * @return array
     */
    public function get(string $key): array;
}
