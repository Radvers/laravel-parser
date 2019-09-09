<?php


namespace App\Utils\Adapters;

use App\Utils\Contracts\ObjectCreator;
use Illuminate\Contracts\Container\Container;

class LaravelObjectCreator implements ObjectCreator
{
    /**
     * @var Container
     */
    private $container;

    /**
     * LaravelObjectCreator constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $class
     * @param array $params
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function make(string $class, array $params = [])
    {
        return $this->container->make($class, $params);
    }
}
