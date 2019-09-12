<?php

namespace App\Utils\Repositories\Laravel;

use App\Exceptions\CriterionException;
use App\Utils\Contracts\ConfigLoader;
use App\Utils\Contracts\ObjectCreator;
use App\Utils\Repositories\Contracts\Criterion;

abstract class CriterionFactory
{
    const DEFAULT_CRITERIA = 'default';
    const SCHEMA = 'criteria.schema';
    /**
     * @var ConfigLoader
     */
    private $config;
    /**
     * @var ObjectCreator
     */
    private $creator;

    /**
     * @var array $schema
     */
    private $schema;

    /**
     * CriterionFactory constructor.
     * @param ConfigLoader $config
     * @param ObjectCreator $creator
     */
    public function __construct(ConfigLoader $config, ObjectCreator $creator)
    {
        $this->creator = $creator;
        $this->config = $config;
        $this->schema = $this->getSchema();
    }

    /**
     * @param string $alias
     * @param $value
     * @return Criterion
     * @throws CriterionException
     */
    public function buildCriterion(string $alias, $value): Criterion
    {
        try {
            return $this->getInstance($this->schema[$alias], $value);
        } catch (\Exception $e) {
            throw CriterionException::unknownAlias($alias);
        }
    }

    private function getSchema(): array
    {
        $default = $this->config->get(self::SCHEMA . '.' . self::DEFAULT_CRITERIA);
        $context = $this->config->get(self::SCHEMA . '.' . $this->getContext());

        return array_merge($default, $context) ?: [];
    }

    private function getInstance(string $className, $value): Criterion
    {
        return $this->creator->make($className, ['value' => $value]);
    }

    /**
     * @return string
     */
    abstract protected function getContext(): string;
}
