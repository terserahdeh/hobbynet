<?php

$runtimePaths = [
    'APP_CONFIG_CACHE'   => '/tmp/config.php',
    'APP_EVENTS_CACHE'   => '/tmp/events.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_ROUTES_CACHE'   => '/tmp/routes.php',
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'VIEW_COMPILED_PATH' => '/tmp/laravel-views',
    'LOG_CHANNEL'        => 'stderr',
    'CACHE_STORE'        => 'array',
    'CACHE_DRIVER'       => 'array',
    'SESSION_DRIVER'     => 'cookie',
    'QUEUE_CONNECTION'   => 'sync',
];

foreach ($runtimePaths as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

if (!is_dir('/tmp/laravel-views')) {
    mkdir('/tmp/laravel-views', 0777, true);
}

require __DIR__ . '/../public/index.php';
