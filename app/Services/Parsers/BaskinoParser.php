<?php

namespace App\Services\Parsers;

use App\Services\Parsers\Contracts\ParserInterface;
use Goutte\Client;

class BaskinoParser implements ParserInterface
{
    /**
     * @var Client
     */
    private $goutte;

    public function __construct(Client $goutte)
    {
        $this->goutte = $goutte;
    }

    public function getLinks2Films(string $url): array
    {
        $links = $this->goutte->request('GET', $url)->filter('.shortpost > .posttitle > a')->extract('href');

        return $links;
    }
}
