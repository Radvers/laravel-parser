<?php

namespace App\Services;

use App\Utils\Contracts\ScenarioInterface;

class PageParser
{
    /**
     * @var ScenarioInterface
     */
    private $parser;

    public function __construct(ScenarioInterface $parser)
    {
        $this->parser = $parser;
    }

    public function parse()
    {
        $output = $this->parser->parse('http://baskino.me/page/1/');
        dd($output);
    }

}
