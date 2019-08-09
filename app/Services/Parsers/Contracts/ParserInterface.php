<?php

namespace App\Services\Parsers\Contracts;

interface ParserInterface
{
    public function getLinks2Films(string $url): array;
}
