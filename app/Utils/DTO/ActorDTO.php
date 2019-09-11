<?php

namespace App\Utils\DTO;

class ActorDTO extends DTO
{
    /**
     * @var string
     */
    private $name;

    /**
     * ActorDTO constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * extract dto fields to array
     * @return array
     */
    public function extractToArray(): array
    {
        $arr['name'] = $this->getName();

        return $arr;
    }

    /**
     * By this key data will be found in data storage
     * @return string
     */
    public function getKey(): string
    {
        return $this->getName();
    }
}
