<?php

namespace App\Adapters;

use App\Contracts\ParserInterface;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class ParserAdapter implements ParserInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * ParserAdapter constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
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
        $response = $this->sendRequest($url);

        return $response->filter($selector)->extract($whatExtract);
    }

    /**
     * @param string $url
     * @param string $method
     * @return Crawler
     */
    private function sendRequest(string $url, string $method = 'GET'): Crawler
    {
        return $this->client->request($method, $url);
    }
}
