<?php

namespace App\Utils\Adapters;

use App\Exceptions\ConfigException;
use App\Utils\Contracts\ConfigLoaderInterface;

class LaravelConfigLoader implements ConfigLoaderInterface
{
    /**
     * @param string $key
     * @return array
     * @throws ConfigException
     */
    public function get(string $key): array
    {
        $config =config($key);
        if (empty($config)) {
            throw new ConfigException();
        }

        return $config;
    }
}
