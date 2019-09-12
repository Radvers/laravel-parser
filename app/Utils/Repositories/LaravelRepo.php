<?php


namespace App\Utils\Repositories;

use App\Utils\Repositories\Laravel\Models\Genre;
use App\Utils\Repositories\Laravel\Models\Movie;
use App\Utils\Repositories\Laravel\Models\Actor;
use App\Utils\Repositories\Laravel\Models\Producer;
use App\Utils\Contracts\ObjectCreator;
use App\Utils\Contracts\Repository;
use App\Utils\DTO\DTO;
use App\Utils\DTO\MovieDTO;
use Illuminate\Database\Eloquent\Model;

class LaravelRepo implements Repository
{
    /**
     * @var Movie
     */
    private $movie;
    /**
     * @var Actor
     */
    private $actor;
    /**
     * @var Genre
     */
    private $genre;
    /**
     * @var Producer
     */
    private $producer;

    /**
     * @var ObjectCreator
     */
    private $creator;

    /**
     * LaravelRepo constructor.
     * @param Movie $movie
     * @param Actor $actor
     * @param Genre $genre
     * @param Producer $producer
     * @param ObjectCreator $creator
     */
    public function __construct(Movie $movie, Actor $actor, Genre $genre, Producer $producer, ObjectCreator $creator)
    {
        $this->movie = $movie->getName();
        $this->actor = $actor;
        $this->genre = $genre;
        $this->producer = $producer;
        $this->creator = $creator;
    }

    /**
     * store movies in data storage
     * @param array $movies
     */
    public function storeAll(array $movies)
    {
        foreach ($movies as $movie) {
            $this->store($movie);
        }
    }

    /**
     * save movie in data storage
     * @param MovieDTO $movieDTO
     */
    public function store(MovieDTO $movieDTO)
    {
        if ($this->findModel($this->movie, 'name', $movieDTO->getName())) {
            return;
        }
        $movie = $this->createModel($this->movie, $movieDTO);
        $this->attachActors($movie, $movieDTO->getActors());
        $this->attachGenres($movie, $movieDTO->getGenres());
        $this->attachProducers($movie, $movieDTO->getProducers());
    }

    /**
     * create link between movie and actors
     * @param Model $movie
     * @param array $actors
     * @return Model
     */
    private function attachActors(Model $movie, array $actors): Model
    {
        foreach ($actors as $actor) {
            $attachment = $this->getModel($this->actor, 'name', $actor);
            /**
             * @var $movie Movie
             */
            $movie->getActors()->attach($attachment->getKey());
        }

        return $movie;
    }

    /**
     * create link between movie and genres
     * @param Model $movie
     * @param array $genres
     * @return Model
     */
    private function attachGenres(Model $movie, array $genres): Model
    {
        foreach ($genres as $genre) {
            $attachment = $this->getModel($this->genre, 'name', $genre);
            $movie->genres()->attach($attachment->getKey());
        }

        return $movie;
    }

    /**
     * create link between movie and producers
     * @param Model $movie
     * @param array $producers
     * @return Model
     */
    private function attachProducers(Model $movie, array $producers): Model
    {
        foreach ($producers as $producer) {
            $attachment = $this->getModel($this->producer, 'name', $producer);
            $movie->producers()->attach($attachment->getKey());
        }

        return $movie;
    }

    /**
     * @param Model $model
     * @param string $field
     * @param DTO $dto
     * @return Model
     */
    private function getModel(Model $model, string $field, DTO $dto): Model
    {
        $item = $this->findModel($model, $field, $dto->getKey());
        if ($item) {
            return $item;
        }

        return $this->createModel($model, $dto);
    }

    /**
     * find data in data storage if exist return Model
     * @param Model $model
     * @param string $field
     * @param $value
     * @return mixed
     */
    private function findModel(Model $model, string $field, $value)
    {
        return $model->byField($field, $value)->first();
    }

    /**
     * create model from DTO
     * @param Model $model
     * @param DTO $dto
     * @return Model
     */
    private function createModel(Model $model, DTO $dto): Model
    {
        $newModel = $this->creator->make(get_class($model));
        $newModel->fill($dto->extractToArray());
        $newModel->save();

        return $newModel;
    }
}
