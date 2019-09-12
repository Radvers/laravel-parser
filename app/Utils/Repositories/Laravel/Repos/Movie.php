<?php


namespace App\Utils\Repositories\Laravel\Repos;

use App\Utils\Repositories\Contracts\CriteriaDictionary;
use App\Utils\Repositories\Laravel\BaseRepository;
use App\Utils\Contracts\Repository\Movie as MovieInterface;
use App\Utils\Repositories\Laravel\Models\Movie as MovieModel;
use App\Utils\Repositories\Laravel\Factories\MovieCriterionFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends BaseRepository implements MovieInterface
{
    public function __construct(MovieCriterionFactory $factory, MovieModel $model)
    {
        parent::__construct($factory, $model);
    }

    /**
     * @param Model $model
     * @return bool
     */
    protected function isSatisfy(Model $model): bool
    {
        return $model instanceof MovieModel;
    }

    public function getByYear(int $year): ?MovieModel
    {
        return $this->findSingleBy([
            CriteriaDictionary::BY_YEAR => 2019,
            CriteriaDictionary::BY_NAME => 'Код молодости',
        ]);
    }
}
