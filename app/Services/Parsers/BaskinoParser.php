<?php

namespace App\Services\Parsers;

use App\Containers\GoutteContainer;
use App\DTO\MovieDTO;
use App\Services\Parsers\Contracts\ParserInterface;

class BaskinoParser implements ParserInterface
{
    /**
     * @var GoutteContainer
     */
    private $goutte;

    private const RESOURCE = 'baskino';

    public function __construct(GoutteContainer $goutte)
    {
        $this->goutte = $goutte;
    }

    /**
     * parses all movies on the page and returns array of MovieDTO
     * @param string $url
     * @return array
     */
    public function parse(string $url): array
    {
        $links = $this->goutte->extractBySelector($url, '.shortpost > .posttitle > a', ['href']);
        $result = [];
        foreach ($links as $link) {
            $result[] = $this->parseMovie($link);
        }

        return $result;
    }

    /**
     * visit page of each movie and parse detailed information and return it in DTO
     * @param string $url
     * @return MovieDTO
     */
    public function parseMovie(string $url): MovieDTO
    {
        $movieInfo = $this->getMovieInfo($url);

        return $this->buildDTO($movieInfo);
    }

    /**
     * get detailed information about movie
     * @param string $url
     * @return array
     */
    private function getMovieInfo(string $url): array
    {
        $movieInfo = $this->goutte->extractBySelector($url, 'div.info td.l + td', ['_text']);
        if (count($movieInfo) == 8) {
            array_splice($movieInfo, 1, 0, "");
        }
        $movieInfo[] = self::RESOURCE;

        return $movieInfo;
    }

    /**
     * create DTO
     * @param array $movieInfo
     * @return MovieDTO
     */
    private function buildDTO(array $movieInfo): MovieDTO
    {

        return new MovieDTO($movieInfo);
    }
}
