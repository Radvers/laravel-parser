<?php

namespace App\DTO;

class ProducerDTO
{
    /**
     * @var string
     */
    private $name;

    /**
     * ProducerDTO constructor.
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
