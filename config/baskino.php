<?php
/**
 * Css Selectors for parsing information
 */
return [
    'links' => [
        'cssSelector' => '.shortpost > .posttitle > a',
        'attribute' => 'href'
    ],
    'movie' => [
        'name' => [
            'cssSelector' => 'td[itemprop=name]',
            'attribute' => '_text',
            'type' => 'text'
        ],
        'description' => [
            'cssSelector' => 'div[id^=news-id-]',
            'attribute' => '_text',
            'type' => 'text'
        ],
        'originalName' => [
            'cssSelector' => '[itemprop=alternativeHeadline]',
            'attribute' => '_text',
            'type' => 'text'
        ],
        'year' => [
            'cssSelector' => 'tr:nth-child(3) > td > a',
            'attribute' => '_text',
            'type' => 'text'
        ],
        'producers' => [
            'cssSelector' => '[itemprop=director]',
            'attribute' => '_text',
            'type' => 'array'
        ],
        'genres' => [
            'cssSelector' => '[itemprop=genre]',
            'attribute' => '_text'
            ,
            'type' => 'array'
        ],
        'duration' => [
            'cssSelector' => '[itemprop=duration]',
            'attribute' => '_text',
            'type' => 'text'
        ],
        'actors' => [
            'cssSelector' => 'span[itemprop=name]',
            'attribute' => '_text',
            'type' => 'array'
        ]
    ]
];
