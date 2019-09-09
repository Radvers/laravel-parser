<?php

namespace App\Utils\Contracts;

interface Scrapper
{
    /**
     * function find information on page using css selector and extract it to array
     * @param string $url
     * @param string $selector
     * @param array $whatExtract
     * @param string $method
     * @return array
     */
    public function sendAndExtract(string $url, string $selector, array $whatExtract, string $method = 'GET'): array;

    /**
     * @param string $url
     * @param string $method
     */
    public function sendRequest(string $url, string $method = 'GET'): void;

    /**
     * @param string $selector
     * @param array $whatExtract
     * @return array
     */
    public function extractFromRequest(string $selector, array $whatExtract): array;

    /**
     * unset request variable
     */
    public function clearRequestData(): void;
}
