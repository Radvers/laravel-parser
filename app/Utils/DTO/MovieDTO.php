<?php

namespace App\DTO;

class MovieDTO
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $originalName;
    /**
     * @var int
     */
    private $year;
    /**
     * @var array
     */
    private $producers;
    /**
     * @var array
     */
    private $genres;
    /**
     * @var string
     */
    private $duration;
    /**
     * @var array
     */
    private $actors;


    /**
     * MovieDTO constructor.
     * @param string $name
     * @param string $originalName
     * @param int $year
     * @param string $duration
     */
    public function __construct(
        string $name,
        string $originalName,
        int $year,
        string $duration
    ) {
        $this->name = $name;
        $this->originalName = $originalName;
        $this->year = $year;
        $this->duration = $duration;
    }

    /**
     * @param array $fields
     * @return MovieDTO
     */
    public static function createFromArray(array $fields): MovieDTO
    {
        $movie = new self(
            $fields['name'],
            $fields['originalName'],
            (int)$fields['year'],
            $fields['duration']
        );
        foreach ($fields['producers'] as $name) {
            $movie->addProducer(new ProducerDTO($name));
        }
        foreach ($fields['genres'] as $name) {
            $movie->addGenre(new GenreDTO($name));
        }
        foreach ($fields['actors'] as $name) {
            $movie->addActor(new ActorDTO($name));
        }

        return $movie;
    }

    /**
     * @param ProducerDTO $producer
     */
    public function addProducer(ProducerDTO $producer): void
    {
        $this->producers[] = $producer;
    }

    public function addGenre(GenreDTO $genre): void
    {
        $this->genres[] = $genre;
    }

    /**
     * @param ActorDTO $actor
     */
    public function addActor(ActorDTO $actor): void
    {
        $this->actors[] = $actor;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return array
     */
    public function getProducers(): array
    {
        return $this->producers;
    }

    /**
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @return array
     */
    public function getActors(): array
    {
        return $this->actors;
    }
}
