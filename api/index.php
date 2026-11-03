<?php

require __DIR__ . '/../vendor/autoload.php';

// Path temporary Vercel yang bisa di-write
$tmpStorage = '/tmp/storage';
$tmpCache = '/tmp/bootstrap/cache';

// Buat folder temporary jika belum ada
if (!file_exists($tmpStorage . '/framework/views')) {
    mkdir($tmpStorage . '/framework/views', 0755, true);
}
if (!file_exists($tmpStorage . '/framework/sessions')) {
    mkdir($tmpStorage . '/framework/sessions', 0755, true);
}
if (!file_exists($tmpStorage . '/framework/cache')) {
    mkdir($tmpStorage . '/framework/cache', 0755, true);
}
if (!file_exists($tmpCache)) {
    mkdir($tmpCache, 0755, true);
}

// Set environment variable untuk bootstrap cache path sebelum Laravel dimuat
$_ENV['APP_SERVICES_CACHE'] = $tmpCache . '/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $tmpCache . '/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $tmpCache . '/config.php';
$_ENV['APP_ROUTES_CACHE']   = $tmpCache . '/routes.php';
$_ENV['APP_EVENTS_CACHE']   = $tmpCache . '/events.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Set storage path ke /tmp
$app->useStoragePath($tmpStorage);

// Force path bootstrap cache ke /tmp
$app->useEnvironmentPath(__DIR__ . '/..');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);