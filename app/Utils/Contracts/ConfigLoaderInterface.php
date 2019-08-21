<?php

namespace App\Utils\Contracts;

interface ConfigLoaderInterface
{
    /**
     * @param string $key
     * @return array
     */
    public function get(string $key): array;
}
