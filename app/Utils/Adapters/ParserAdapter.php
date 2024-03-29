<?php

namespace App\Utils\Adapters;

use App\Exceptions\ParserException;
use App\Utils\Contracts\ParserInterface;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class ParserAdapter implements ParserInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Crawler
     */
    private $response;

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
     * @param string $method
     * @return array
     * @throws ParserException
     */
    public function sendAndExtract(string $url, string $selector, array $whatExtract, string $method = 'GET'): array
    {
        $this->sendRequest($url, $method);
        $result = $this->extractFromRequest($selector, $whatExtract);
        $this->clearRequestData();

        return $result;
    }

    /**
     * @param string $url
     * @param string $method
     */
    public function sendRequest(string $url, string $method = 'GET'): void
    {
        $this->response = $this->client->request($method, $url);
        dd($this->response);
    }

    /**
     * @param string $selector
     * @param array $whatExtract
     * @return array
     * @throws ParserException
     */
    public function extractFromRequest(string $selector, array $whatExtract): array
    {
        if (empty($this->response)) {
            throw new ParserException();
        }

        return $this->response->filter($selector)->extract($whatExtract);
    }

    /**
     * unset request variable
     */
    public function clearRequestData(): void
    {
        unset($this->response);
    }


}
