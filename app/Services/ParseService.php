<?php

namespace App\Services;

use App\Utils\Parser\PageParser;

class ParseService
{
    /**
     * @var PageParser
     */
    private $parser;

    /**
     * ParseService constructor.
     * @param PageParser $parser
     */
    public function __construct(PageParser $parser)
    {
        $this->parser = $parser;
    }

    public function parse(string $url)
    {
        $result = $this->parser->parse($url);
        dd($result);
    }


}
