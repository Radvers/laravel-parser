<?php

namespace App\Utils\Repositories\Laravel\Criteria;

use App\Utils\Repositories\Contracts\Criterion;
use Illuminate\Database\Eloquent\Builder;

class ByKey implements Criterion
{
    /**
     * @var $value
     */
    private $value;

    /**
     * ByKey constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query): Builder
    {
        return $query->whereKey($this->value);
    }
}
