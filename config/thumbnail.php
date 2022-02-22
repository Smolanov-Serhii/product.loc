<?php
return [
    'attributes' => [
        'mediaFront' => [
            'formats' => [
                'webp' => [1024, 768, 480],
                'origin' => [1024, 768, 480],
            ],
        ],
        'admin' => [
            'formats' => [
                'origin' => [320],
            ],
        ],
    ],
    'uploadPathForRepository' => [
        'AdditionRepository' => 'additions',
        'SeoRepository' => 'seo',
    ],
];