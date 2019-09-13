<?php


namespace App\Utils\Repositories\Laravel;

use App\Utils\Contracts\Queryable;
use App\Utils\Repositories\Contracts\Criterion;
use App\Utils\Repositories\Contracts\Repository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Repository
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $builder;
    /**
     * @var Criterion[]
     */
    private $criteria = [];

    /**
     * @var Model
     */
    private $model;

    /**
     * @var CriterionFactory
     */
    private $factory;

    public function __construct(CriterionFactory $factory, Model $model)
    {
        $this->model = $model;
        $this->factory = $factory;
        $this->builder = $this->model->newQuery();
    }

    public function findSingleBy(Queryable $query): ?Model
    {
        $this->refreshBuilder();
        $this->pushCriteria($query);
        $this->applyCriteria();

        return $this->builder->first();
    }

    /*public function create(array $data): Model
    {
        // TODO: Implement create() method.
    }*/

    private function refreshBuilder(): void
    {
        $this->builder->newQuery();
    }

    private function pushCriteria(Queryable $query)
    {
        foreach ($query->getCriteria() as $criterion => $value) {
            $this->criteria[] = $this->buildCriterion($criterion, $value);
        }
    }

    private function buildCriterion(string $criterion, $value): Criterion
    {
        return $this->factory->buildCriterion($criterion, $value);
    }

    private function applyCriteria(): void
    {
        foreach ($this->criteria as $criterion) {
            $this->builder = $criterion->apply($this->builder);
        }
    }
}
