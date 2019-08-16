<?php

namespace App\Contracts;

interface ParserInterface
{
    /**
     * function find information on page using css selector and extract it to array
     * @param string $url
     * @param string $selector
     * @param array $whatExtract
     * @return array
     */
    public function extractBySelector(string $url, string $selector, array $whatExtract): array;
}
