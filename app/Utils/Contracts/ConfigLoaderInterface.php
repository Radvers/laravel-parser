<?php

namespace App\Contracts;

interface ConfigLoaderInterface
{
    /**
     * @param string $key
     * @return array
     */
    public function getConfigs(string $key): array;
}
