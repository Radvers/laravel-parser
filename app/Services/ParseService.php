<?php

namespace App\Services;

use App\Utils\Contracts\Repository;
use App\Utils\Parser\PageParser;

class ParseService
{
    /**
     * @var PageParser
     */
    private $parser;

    private $repository;

    /**
     * ParseService constructor.
     * @param PageParser $parser
     * @param Repository $repository
     */
    public function __construct(PageParser $parser, Repository $repository)
    {
        $this->parser = $parser;
        $this->repository = $repository;
    }

    public function parse(string $url)
    {
        $movies = $this->parser->parse($url);
        $this->repository->storeAll($movies);

        dd($movies);
    }


}
