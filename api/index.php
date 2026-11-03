<?php

require __DIR__ . '/../vendor/autoload.php';

// Direktori sementara Vercel
$tmpStorage = '/tmp/storage';
$tmpCache = '/tmp/bootstrap/cache';

// Buat direktori sementara jika belum ada
$dirs = [
    $tmpStorage . '/framework/views',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/cache',
    $tmpCache
];

foreach ($dirs as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Override Cache & Storage Environment
$_ENV['APP_SERVICES_CACHE'] = $tmpCache . '/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $tmpCache . '/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $tmpCache . '/config.php';
$_ENV['APP_ROUTES_CACHE']   = $tmpCache . '/routes.php';
$_ENV['APP_EVENTS_CACHE']   = $tmpCache . '/events.php';

// Force Session ke /tmp (File) & cookie HTTPS
$_ENV['SESSION_DRIVER'] = 'file';
$_ENV['SESSION_SECURE_COOKIE'] = 'false';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Set storage path ke /tmp
$app->useStoragePath($tmpStorage);

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);