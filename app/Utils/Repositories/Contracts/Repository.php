<?php

namespace App\Utils\Repositories\Contracts;

use App\Utils\Contracts\Queryable;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function findSingleBy(Queryable $query): ?Model;
    //public function create(array $data): Model;
}
