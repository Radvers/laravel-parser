<?php


namespace App\Utils\Repositories\Laravel\Repos;

use App\Utils\Repositories\Laravel\BaseRepository;
use App\Utils\Contracts\Repository\Movie as MovieInterface;
use App\Utils\Repositories\Laravel\Models\Movie as MovieModel;
use App\Utils\Repositories\Laravel\Factories\MovieCriterionFactory;

class Movie extends BaseRepository implements MovieInterface
{
    public function __construct(MovieCriterionFactory $factory, MovieModel $model)
    {
        parent::__construct($factory, $model);
    }

}
