<?php

namespace App\Utils\DTO;

class MovieDTO extends DTO
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
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
    private $producers = [];
    /**
     * @var array
     */
    private $genres = [];
    /**
     * @var string
     */
    private $duration;
    /**
     * @var array
     */
    private $actors = [];
    /**
     * @var string
     */
    private $url;


    /**
     * MovieDTO constructor.
     * @param string $name
     * @param string $description
     * @param string $originalName
     * @param int $year
     * @param string $duration
     * @param string $url
     */
    public function __construct(
        string $name,
        string $description,
        string $originalName,
        int $year,
        string $duration,
        string $url
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->originalName = $originalName;
        $this->year = $year;
        $this->duration = $duration;
        $this->url = $url;
    }

    /**
     * @param array $fields
     * @return MovieDTO
     */
    public static function createFromArray(array $fields): MovieDTO
    {
        $movie = new self(
            $fields['name'],
            $fields['description'],
            $fields['originalName'],
            (int)$fields['year'],
            $fields['duration'],
            $fields['url']
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
     * extract dto fields to array
     * @return array
     */
    public function extractToArray(): array
    {
        $arr['name'] = $this->getName();
        $arr['description'] = $this->getDescription();
        $arr['original_name'] = $this->getOriginalName();
        $arr['year'] = $this->getYear();
        $arr['duration'] = $this->getDuration();
        $arr['url'] = $this->getUrl();

        return $arr;
    }

    /**
     * By this key data will be found in data storage
     * @return string
     */
    public function getKey(): string
    {
        return $this->getName();
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
    public function getDescription(): string
    {
        return $this->description;
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getActors(): array
    {
        return $this->actors;
    }
}
