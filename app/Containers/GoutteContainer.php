<?php

namespace App\Containers;

use Goutte\Client;

class GoutteContainer
{
    /**
     * @var Client
     */
    private $goutte;

    /**
     * GoutteContainer constructor.
     * @param Client $goutte
     */
    public function __construct(Client $goutte)
    {
        $this->goutte = $goutte;
    }

    /**
     * function find information on page using css selector and extract it to array
     * @param string $url
     * @param string $selector
     * @param array $whatExtract
     * @return array
     */
    public function extractBySelector(string $url, string $selector, array $whatExtract): array
    {

        return $this->goutte->request('GET', $url)->filter($selector)->extract($whatExtract);
    }
}
