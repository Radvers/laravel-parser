<?php

namespace App\Utils\Contracts\Repository;

interface Movie
{
    public function getByYear(int $year);
}
