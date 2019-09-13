<?php

use App\Utils\Repositories\Laravel\Criteria\Dictionaries\CriteriaDictionary;
use App\Utils\Repositories\Laravel\Criteria\ByName;
use App\Utils\Repositories\Laravel\Criteria\Dictionaries\MovieDictionary;
use App\Utils\Repositories\Laravel\Criteria\Movie\ByYear;
use App\Utils\Repositories\Laravel\Criteria\WithRelation;

return [
    'schema' => [
        'default' => [
            CriteriaDictionary::BY_NAME => ByName::class,
            CriteriaDictionary::WITH_RELATION => WithRelation::class
        ],
        'movie' => [
            MovieDictionary::BY_YEAR => ByYear::class
        ],

    ],
];
