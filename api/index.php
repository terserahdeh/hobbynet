<?php

error_reporting(E_ALL);
ini_set('log_errors', '1');

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    error_log('Laravel bootstrap error: ' . $e);
    http_response_code(500);
    echo 'Application error. Check Vercel Runtime Logs.';
}
