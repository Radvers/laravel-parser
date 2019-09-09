<?php

namespace App\Utils\Contracts;

use App\Utils\DTO\MovieDTO;

interface Repository
{
    public function store(MovieDTO $movie);
}
