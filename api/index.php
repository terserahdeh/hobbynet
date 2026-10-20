<?php

$basePath = dirname(__DIR__);

$runtimePaths = [
    'APP_CONFIG_CACHE'   => '/tmp/config.php',
    'APP_EVENTS_CACHE'   => '/tmp/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE'   => '/tmp/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'VIEW_COMPILED_PATH' => '/tmp/laravel-views',
    'LOG_CHANNEL'        => 'stderr',
    'CACHE_STORE'        => 'array',
    'SESSION_DRIVER'     => 'cookie',
    'QUEUE_CONNECTION'   => 'sync',
];

foreach ($runtimePaths as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

foreach ([
    '/tmp/laravel-views',
    '/tmp/laravel-cache',
    '/tmp/laravel-sessions',
] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

require $basePath . '/vendor/autoload.php';

$app = require $basePath . '/bootstrap/app.php';

$app->handleRequest(
    Illuminate\Http\Request::capture()
);
