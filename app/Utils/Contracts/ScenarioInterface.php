<?php

namespace App\Utils\Contracts;

interface ScenarioInterface
{
    public function parse(string $url): array;
}
