<?php


namespace App\Utils\Contracts;

interface ObjectCreator
{
    /**
     * create object by class.
     * @param string $class
     * @param array $params
     * @return mixed
     */
    public function make(string $class, array $params = []);
}
