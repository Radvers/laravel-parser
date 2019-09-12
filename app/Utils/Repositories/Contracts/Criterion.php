<?php

namespace App\Utils\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Criterion
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder;
}
