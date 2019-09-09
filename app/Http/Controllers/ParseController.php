<?php

namespace App\Http\Controllers;

use App\Services\ParseService;
use App\Utils\Parser\PageParser;

class ParseController
{
    /**
     * @var PageParser
     */
    private $service;

    public function __construct(ParseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->service->parse('http://baskino.me/page/1/');
    }
}
