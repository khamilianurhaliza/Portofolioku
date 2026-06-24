<?php

use App\Controllers\Web\HomeController;
use App\Controllers\Web\ContactController;

/** @var \App\Core\Router $router */

$router->get('/', [\App\Controllers\Web\HomeController::class, 'index']);
$router->get('/project/{slug}', [\App\Controllers\Web\HomeController::class, 'showProject']);
$router->get('/experience/{id}', [\App\Controllers\Web\HomeController::class, 'showExperience']);
$router->post('/contact', [\App\Controllers\Web\ContactController::class, 'submit']);
