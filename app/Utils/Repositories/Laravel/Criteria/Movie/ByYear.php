<?php

namespace App\Utils\Repositories\Laravel\Criteria\Movie;

use App\Utils\Repositories\Contracts\CriteriaDictionary;
use App\Utils\Repositories\Contracts\Criterion;
use Illuminate\Database\Eloquent\Builder;

class ByYear implements Criterion
{
    /**
     * @var int $value
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        return $query->where(CriteriaDictionary::BY_YEAR, $this->value);
    }
}
