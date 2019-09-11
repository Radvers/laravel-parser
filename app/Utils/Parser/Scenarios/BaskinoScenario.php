<?php

namespace App\Utils\Parser\Scenarios;

use App\Utils\DTO\MovieDTO;

class BaskinoScenario extends ParseScenario
{
    const LINKS = 'baskino.links';
    const MOVIE = 'baskino.movie';
    const SELECTOR = 'cssSelector';
    const ATTRIBUTE = 'attribute';
    const TYPE = 'type';

    /**
     * parses all movies on the page and returns array of MovieDTO
     * @param string $url
     * @return array
     */
    public function parse(string $url): array
    {
        $links = $this->getLinks($url);
        $result = [];
        foreach ($links as $link) {
            $result[] = $this->parseMovie($link);
        }

        return $result;
    }

    /**
     * parse main page to get links to each film on it
     * @param string $url
     * @return array
     */
    private function getLinks(string $url): array
    {
        $config = $this->config->get(self::LINKS);
        return $this->scrapper->sendAndExtract($url, $config[self::SELECTOR], [$config[self::ATTRIBUTE]]);
    }

    /**
     * visit page of movie and parse detailed information and return it in DTO
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
        $movieInfo['url'] = $url;
        $this->scrapper->sendRequest($url);
        foreach ($config as $key => $value) {
            $parseResult = $this->scrapper->extractFromRequest($value[self::SELECTOR], [$value[self::ATTRIBUTE]]);
            $movieInfo[$key] = $this->transformParseResult($parseResult, $value[self::TYPE]);
        }
        $this->scrapper->clearRequestData();

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
