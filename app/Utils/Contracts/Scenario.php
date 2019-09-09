<?php

namespace App\Utils\Contracts;

interface Scenario
{
    /**
     * parses all movies on the page and returns array of MovieDTO
     * @param string $url
     * @return array
     */
    public function parse(string $url): array;
}
