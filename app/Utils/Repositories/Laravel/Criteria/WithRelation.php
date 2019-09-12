<?php


namespace App\Utils\Repositories\Laravel\Criteria;

use App\Utils\Repositories\Contracts\Criterion;
use Illuminate\Database\Eloquent\Builder;

class WithRelation implements Criterion
{
    private $value;

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
        return $query->with($this->value);
    }
}
