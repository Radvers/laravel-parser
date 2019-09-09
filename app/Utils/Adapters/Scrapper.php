<?php

namespace App\Utils\Adapters;

use App\Exceptions\ParserException;
use App\Utils\Contracts\Scrapper as ScrapperInterface;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class Scrapper implements ScrapperInterface
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
        $crawler = $this->filterResponse($selector);

        return $this->extractFromResponse($crawler, $whatExtract);
    }

    /**
     * @param string $selector
     * @return Crawler
     */
    public function filterResponse(string $selector): Crawler
    {

        return $this->response->filter($selector);
    }

    /**
     * @param Crawler $crawler
     * @param array $whatExtract
     * @return array
     */
    public function extractFromResponse(Crawler $crawler, array $whatExtract): array
    {

        return $crawler->extract($whatExtract);
    }

    /**
     * unset request variable
     */
    public function clearRequestData(): void
    {
        unset($this->response);
    }


}
