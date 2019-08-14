<?php

namespace App\Services\Parsers\Contracts;

interface ParserInterface
{
    public function parse(string $url): array;
}
