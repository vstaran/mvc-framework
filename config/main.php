<?php

use app\Components\Math\MathFactory;
use framework\Components\Cache\MemoryCacheFactory;
use framework\Components\Router\RouterFactory;

return [
    'app_name' => 'Test framework',
    'components' => [
        'router' => [
            'factory' => RouterFactory::class
        ],
        'cache' => [
            'factory' => MemoryCacheFactory::class,
        ],
        'math' => [
            'factory' => MathFactory::class,
        ]
    ],
];