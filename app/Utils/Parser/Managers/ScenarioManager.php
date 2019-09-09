<?php

namespace App\Utils\Parser\Managers;

use App\Exceptions\SourceException;
use App\Utils\Contracts\ConfigLoader;
use App\Utils\Contracts\ObjectCreator;
use App\Utils\Parser\Scenarios\ParseScenario;

class ScenarioManager
{
    /**
     * @var ObjectCreator
     */
    protected $creator;

    /**
     * @var ConfigLoader
     */
    protected $config;

    /**
     * ScenarioManager constructor.
     * @param ConfigLoader $config
     * @param ObjectCreator $creator
     */
    public function __construct(ConfigLoader $config, ObjectCreator $creator)
    {
        $this->config = $config;
        $this->creator = $creator;
    }

    /**exctract from config scenario class and create it
     * @param string $source
     * @return ParseScenario
     * @throws SourceException
     */
    public function getScenario(string $source): ParseScenario
    {
        $scenarios = $this->config->get('scenarios');
        if (array_key_exists($source, $scenarios)) {

            return $this->creator->make($scenarios[$source]);
        }

        throw SourceException::unknownSource($source);
    }
}
