<?php

namespace App\Utils\Repositories\Laravel\QueryObjects;

use App\Utils\Contracts\Queryable;
use App\Utils\Repositories\Laravel\Criteria\Dictionaries\CriteriaDictionary;
use App\Utils\Repositories\Laravel\Criteria\Dictionaries\MovieDictionary;

class GetByYearName implements Queryable
{
    /**
     * @var array $criteria
     */
    private $criteria;
    /**
     * GetByYearName constructor.
     * @param int $year
     * @param string $name
     */
    public function __construct(int $year, string $name)
    {
        $this->criteria = [
            MovieDictionary::BY_YEAR => $year,
            CriteriaDictionary::BY_NAME => $name
        ];
    }

    /**
     * @return array
     */
    public function getCriteria(): array
    {
        return $this->criteria;
    }
}
