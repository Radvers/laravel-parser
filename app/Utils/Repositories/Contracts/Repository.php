<?php

namespace App\Utils\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function findSingleBy(array $criteria): ?Model;
    //public function create(array $data): Model;
}
