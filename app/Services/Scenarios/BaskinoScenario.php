<?php

namespace App\Services\Scenarios;

use App\Contracts\ParserInterface;
use App\Contracts\ScenarioInterface;
use App\DTO\MovieDTO;

class BaskinoScenario implements ScenarioInterface
{
    /**
     * @var ParserInterface
     */
    private $parser;

    public function __construct(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * parses all movies on the page and returns array of MovieDTO
     * @param string $url
     * @return array
     */
    public function parse(string $url): array
    {
        //TODO try/catch
        $links = $this->getLinks($url);
        $result = [];
        foreach ($links as $link) {
            $result[] = $this->parseMovie($link);
        }

        return $result;
    }

    private function getLinks(string $url): array
    {
        $config = config('baskino.links');
        return $this->parser->extractBySelector($url, $config['cssSelector'], [$config['attribute']]);
    }

    /**
     * visit page of each movie and parse detailed information and return it in DTO
     * @param string $url
     * @return MovieDTO
     */
    public function parseMovie(string $url): MovieDTO
    {
        $movieInfo = $this->getMovieInfo($url);
        return MovieDTO::createFromArray($movieInfo);
    }

    /**
     * get detailed information about movie
     * @param string $url
     * @return array
     */
    private function getMovieInfo(string $url): array
    {
        $config = config('baskino.movie');
        $movieInfo = [];
        foreach ($config as $key => $value) {
            //TODO вынести в другой метод.не validate
            $parseResult = $this->parser->extractBySelector($url, $value['cssSelector'], [$value['attribute']]);
            $movieInfo[$key] = $this->validateParseResult($parseResult, $value['type']);
        }

        return $movieInfo;
    }

    /**
     * @param array $parseResult
     * @param string $type
     * @return array|string
     */
    private function validateParseResult(array $parseResult, string $type)
    {
        if ($type === 'text') {
            return empty($parseResult) ? '' : reset($parseResult);
        }

        return $parseResult;
    }
}
