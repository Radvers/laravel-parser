<?php

namespace App\Utils\Adapters;

use App\Utils\Contracts\ConfigLoader;
use Illuminate\Contracts\Config\Repository;

class LaravelConfigLoader implements ConfigLoader
{
    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $key
     * @return array
     */
    public function get(string $key): array
    {

        return $this->repository->get($key);
    }
}
