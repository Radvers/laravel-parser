<?php

namespace App\Utils\Contracts;

interface Queryable
{
    /**
     * @return array<string, mixed>
     */
    public function getCriteria(): array;
}
