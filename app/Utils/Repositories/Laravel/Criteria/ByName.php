<?php

namespace App\Utils\Repositories\Laravel\Criteria;

use App\Utils\Repositories\Contracts\CriteriaDictionary;
use App\Utils\Repositories\Contracts\Criterion;
use Illuminate\Database\Eloquent\Builder;

class ByName implements Criterion
{
    /**
     * @var string $value
     */
    private $value;
    /**
     * Criterion constructor.
     * @param $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        return $query->where(CriteriaDictionary::BY_NAME, $this->value);
    }
}
