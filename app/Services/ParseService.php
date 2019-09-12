<?php

namespace App\Services;

use App\Utils\Contracts\Repository\Movie;
use App\Utils\Parser\PageParser;
use App\Utils\Repositories\Contracts\CriteriaDictionary;

class ParseService
{
    /**
     * @var PageParser
     */
    private $parser;

    /**
     * @var Movie
     */
    private $movie;

    /**
     * ParseService constructor.
     * @param PageParser $parser
     * @param Movie $movie
     */
    public function __construct(PageParser $parser, Movie $movie)
    {
        $this->parser = $parser;
        $this->movie = $movie;
    }

    public function parse(string $url)
    {
        //$movies = $this->parser->parse($url);
        $repo = $this->movie->getByYear(2019);
        //->add($name, $value)

        dd($repo);
        /*foreach ($movies as $movie) {
            $this->movie->store($movie);
        }*/


        //dd($movies);
    }


}
