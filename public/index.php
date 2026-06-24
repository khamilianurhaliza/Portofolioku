<?php

define('BASE_PATH', dirname(__DIR__));

// Simple autoloader for PSR-4 compliance
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = BASE_PATH . '/app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Load Router
require BASE_PATH . '/app/Core/Router.php';

$router = new \App\Core\Router();

// Load Routes
require BASE_PATH . '/routes/web.php';
require BASE_PATH . '/routes/admin.php';

// Dispatch Request
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
