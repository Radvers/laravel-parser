<?php

namespace App\Utils\Contracts\Repository;

use App\Utils\Contracts\Queryable;

interface Movie
{
    public function findSingleBy(Queryable $query);
}
