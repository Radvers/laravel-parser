<?php

namespace App\Services;

use App\Services\Parsers\Contracts\ParserInterface;

class PageParser
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
     *
     */
    public function parse()
    {
        $output = $this->parser->parse('http://baskino.me/page/1/');
        echo '<pre>';
        var_dump($output);
    }

}
