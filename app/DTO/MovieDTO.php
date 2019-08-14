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
     * @var string
     */
    private $country;
    /**
     * @var string
     */
    private $tagLine;
    /**
     * @var string
     */
    private $producer;
    /**
     * @var string
     */
    private $genre;
    /**
     * @var string
     */
    private $time;
    /**
     * @var string
     */
    private $actors;


    public function __construct(array $movieInfo)
    {
        $this->name = $movieInfo[0];
        $this->originalName = $movieInfo[1];
        $this->year = (int)$movieInfo[2];
        $this->country = $movieInfo[3];
        $this->tagLine = $movieInfo[4];
        $this->producer = $movieInfo[5];
        $this->genre = $movieInfo[6];
        $this->time = $movieInfo[7];
        $this->actors = $movieInfo[8];
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
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getTagLine(): string
    {
        return $this->tagLine;
    }

    public function getProducer(): string
    {
        return $this->producer;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getActors(): string
    {
        return $this->actors;
    }
}
