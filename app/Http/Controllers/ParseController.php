<?php

namespace App\Http\Controllers;

use App\Services\PageParser;

class ParseController
{
    private $pageParser;
    public function __construct(PageParser $parser)
    {
        $this->pageParser = $parser;
    }

    public function index() {
        $this->pageParser->parse();
    }
}
