<?php


namespace App\Utils\Repositories\Laravel;

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

    /**
     * @param Model $model
     * @return bool
     */
    abstract protected function isSatisfy(Model $model): bool;

    public function findSingleBy(array $criteria): ?Model
    {
        $this->refreshBuilder();
        $this->pushCriteria($criteria);
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

    private function pushCriteria(array $criteria)
    {
        foreach ($criteria as $criterion => $value) {
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
