<?php

namespace App\DTO;

class ActorDTO
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
}
