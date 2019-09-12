<?php


namespace App\Utils\Repositories\Laravel\Factories;

use App\Utils\Repositories\Laravel\CriterionFactory;

class MovieCriterionFactory extends CriterionFactory
{
    const CONTEXT = 'movie';

    /**
     * @return string
     */
    protected function getContext(): string
    {
        return self::CONTEXT;
    }

}
