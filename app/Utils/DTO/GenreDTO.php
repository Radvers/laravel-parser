<?php

namespace App\Utils\DTO;

class GenreDTO
{
    /**
     * @var string
     */
    private $name;

    /**
     * GenreDTO constructor.
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
