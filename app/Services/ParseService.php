<?php

namespace App\Services;

use App\Utils\Contracts\Repository\Movie;
use App\Utils\Parser\PageParser;
use App\Utils\Repositories\Laravel\Criteria\Dictionaries\CriteriaDictionary;
use App\Utils\Repositories\Laravel\QueryObjects\GetByYearName;

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
        $query = new GetByYearName(2019, 'Код молодости');
        $repo = $this->movie->findSingleBy($query);

        dd($repo);
        /*foreach ($movies as $movie) {
            $this->movie->store($movie);
        }*/


        //dd($movies);
    }


}
