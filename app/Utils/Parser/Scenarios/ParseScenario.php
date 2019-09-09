<?php

namespace App\Utils\Parser\Scenarios;

use App\Exceptions\ScenarioException;
use App\Utils\Contracts\ConfigLoader;
use App\Utils\Contracts\Scrapper;
use App\Utils\DTO\MovieDTO;

abstract class ParseScenario
{
    /**
     * @var Scrapper
     */
    protected $scrapper;

    /**
     * @var ConfigLoader
     */
    protected $config;

    public function __construct(Scrapper $parser, ConfigLoader $config)
    {
        $this->scrapper = $parser;
        $this->config = $config;
    }

    /**
     * parses all movies on the page and returns array of MovieDTO
     * @param string $url
     * @return array
     * @throws ScenarioException
     */
    abstract public function parse(string $url): array;

    /**
     * visit page of movie and parse detailed information and return it in DTO
     * @param string $url
     * @return MovieDTO
     */
    abstract public function parseMovie(string $url): MovieDTO;
}
