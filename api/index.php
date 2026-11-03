
<?php

// HTTPS reverse proxy Vercel
$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;

require __DIR__ . '/../vendor/autoload.php';

// Direktori sementara Vercel
$tmpStorage = '/tmp/storage';
$tmpCache = '/tmp/bootstrap/cache';

$dirs = [
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/cache',
    $tmpCache,
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Direktori cache Laravel
$_ENV['APP_SERVICES_CACHE'] = $tmpCache . '/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $tmpCache . '/packages.php';
$_ENV['APP_CONFIG_CACHE'] = $tmpCache . '/config.php';
$_ENV['APP_ROUTES_CACHE'] = $tmpCache . '/routes.php';
$_ENV['APP_EVENTS_CACHE'] = $tmpCache . '/events.php';

// Gunakan session cookie, bukan array
$_ENV['SESSION_DRIVER'] = 'cookie';
$_SERVER['SESSION_DRIVER'] = 'cookie';

$_ENV['CACHE_DRIVER'] = 'array';
$_SERVER['CACHE_DRIVER'] = 'array';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Gunakan storage sementara Vercel
$app->useStoragePath($tmpStorage);

$kernel = $app->make(
    Illuminate\Contracts\Http\Kernel::class
);

$request = Illuminate\Http\Request::capture();

$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);
