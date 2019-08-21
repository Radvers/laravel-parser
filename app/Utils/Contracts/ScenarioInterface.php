<?php

namespace App\Contracts;

interface ScenarioInterface
{
    public function parse(string $url): array;
}
