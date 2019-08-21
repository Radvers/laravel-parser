<?php

namespace App\Services\Scenarios;

use App\Exceptions\ScenarioException;
use App\Utils\Contracts\ConfigLoaderInterface;
use App\Utils\Contracts\ParserInterface;
use App\Utils\Contracts\ScenarioInterface;
use App\Utils\DTO\MovieDTO;

class BaskinoScenario implements ScenarioInterface
{
    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * @var ConfigLoaderInterface
     */
    private $config;

    const LINKS = 'baskino.links';
    const MOVIE = 'baskino.movie';
    const SELECTOR = 'cssSelector';
    const ATTRIBUTE = 'attribute';
    const TYPE = 'type';

    public function __construct(ParserInterface $parser, ConfigLoaderInterface $config)
    {
        $this->parser = $parser;
        $this->config = $config;
    }

    /**
     * parses all movies on the page and returns array of MovieDTO
     * @param string $url
     * @return array
     * @throws ScenarioException
     */
    public function parse(string $url): array
    {
        try {
            $links = $this->getLinks($url);
            $result = [];
            foreach ($links as $link) {
                $result[] = $this->parseMovie($link);
            }

            return $result;
        } catch (\Exception $e) {
            throw new ScenarioException($e->getMessage());
        }
    }

    private function getLinks(string $url): array
    {
        $config = $this->config->get(self::LINKS);
        return $this->parser->sendAndExtract($url, $config[self::SELECTOR], [$config[self::ATTRIBUTE]]);
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
        $config = $this->config->get(self::MOVIE);
        $movieInfo = [];
        $this->parser->sendRequest($url);
        foreach ($config as $key => $value) {
            $parseResult = $this->parser->extractFromRequest($value[self::SELECTOR], [$value[self::ATTRIBUTE]]);
            $movieInfo[$key] = $this->transformParseResult($parseResult, $value[self::TYPE]);
        }
        $this->parser->clearRequestData();

        return $movieInfo;
    }

    /**
     * @param array $parseResult
     * @param string $type
     * @return array|string
     */
    private function transformParseResult(array $parseResult, string $type)
    {
        if ($type === 'text') {
            return empty($parseResult) ? '' : reset($parseResult);
        }

        return $parseResult;
    }
}
