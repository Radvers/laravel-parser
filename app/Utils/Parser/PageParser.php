<?php

namespace App\Utils\Parser;

use App\Utils\Parser\Managers\ScenarioManager;

class PageParser
{
    /**
     * @var ScenarioManager
     */
    private $manager;

    public function __construct(ScenarioManager $manager)
    {

        $this->manager = $manager;
    }

    /**
     * @param string $url
     * @return array
     * @throws \App\Exceptions\SourceException.
     */
    public function parse(string $url): array
    {
        $source = $this->getSourceName($url);
        $parser = $this->manager->getScenario($source);
        $output = $parser->parse($url);

        return $output;
    }

    /**
     * function cut source name from url
     * @param string $url
     * @return string
     */
    private function getSourceName(string $url): string
    {
        $urlData = parse_url($url);
        $host = $urlData['host'];

        return stristr($host, '.', true);
    }
}
