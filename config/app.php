<?php
use Cake\Cache\Engine\FileEngine;
use Cake\Core\Configure;

// Define CACHE as a constant
define('CACHE', TMP . 'cache' . DS);

// Configure cache and error settings
$cache = [
    'default' => [
        'className' => FileEngine::class,
        'path' => CACHE,
        'url' => env('CACHE_DEFAULT_URL', null),
    ],
    '_cake_core_' => [
        'className' => FileEngine::class,
        'prefix' => 'myapp_cake_core_',
        'path' => CACHE . 'persistent/',
        'serialize' => true,
        'duration' => '+10 seconds',
        'url' => env('CACHE_CAKECORE_URL', null),
    ],
    '_cake_model_' => [
        'className' => FileEngine::class,
        'prefix' => 'myapp_cake_model_',
        'path' => CACHE . 'models/',
        'serialize' => true,
        'duration' => '+10 seconds',
        'url' => env('CACHE_CAKEMODEL_URL', null),
    ],
    'Error' => [
        'errorLevel' => E_ALL & ~E_DEPRECATED,
        'exceptionRenderer' => 'Cake\Error\ExceptionRenderer',
        'skipLog' => [],
        'log' => true,
        'trace' => true,
        'debug' => false,
    ],
];

Configure::write('Cache', $cache);
