<?php

use App\Utils\Repositories\Contracts\CriteriaDictionary;
use App\Utils\Repositories\Laravel\Criteria\ByName;
use App\Utils\Repositories\Laravel\Criteria\Movie\ByYear;
use App\Utils\Repositories\Laravel\Criteria\WithRelation;

return [
    'schema' => [
        'default' => [
            CriteriaDictionary::BY_NAME => ByName::class,
            CriteriaDictionary::WITH_RELATION => WithRelation::class
        ],
        'movie' => [
            CriteriaDictionary::BY_YEAR => ByYear::class
        ],

    ],
];
