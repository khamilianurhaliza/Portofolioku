<?php

use App\Controllers\Admin\AuthController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\ProjectController;

/** @var \App\Core\Router $router */

$router->get('/admin/login', [AuthController::class, 'showLoginForm']);
$router->post('/admin/login', [AuthController::class, 'login']);
$router->post('/admin/logout', [AuthController::class, 'logout']);

$router->get('/admin/dashboard', [DashboardController::class, 'index']);

// Projects
$router->get('/admin/projects', [ProjectController::class, 'index']);
$router->post('/admin/projects', [ProjectController::class, 'store']);
$router->get('/admin/projects/{id}/edit', [ProjectController::class, 'edit']);
$router->post('/admin/projects/{id}/edit', [ProjectController::class, 'update']);
$router->post('/admin/projects/{id}/delete', [ProjectController::class, 'delete']);

// Technologies
$router->get('/admin/technologies', [\App\Controllers\Admin\TechnologyController::class, 'index']);
$router->post('/admin/technologies', [\App\Controllers\Admin\TechnologyController::class, 'store']);
$router->get('/admin/technologies/{id}/edit', [\App\Controllers\Admin\TechnologyController::class, 'edit']);
$router->post('/admin/technologies/{id}/edit', [\App\Controllers\Admin\TechnologyController::class, 'update']);
$router->post('/admin/technologies/{id}/delete', [\App\Controllers\Admin\TechnologyController::class, 'delete']);

// Skills
$router->get('/admin/skills', [\App\Controllers\Admin\SkillController::class, 'index']);
$router->post('/admin/skills', [\App\Controllers\Admin\SkillController::class, 'store']);
$router->get('/admin/skills/{id}/edit', [\App\Controllers\Admin\SkillController::class, 'edit']);
$router->post('/admin/skills/{id}/edit', [\App\Controllers\Admin\SkillController::class, 'update']);
$router->post('/admin/skills/{id}/delete', [\App\Controllers\Admin\SkillController::class, 'delete']);

// Experiences
$router->get('/admin/experiences', [\App\Controllers\Admin\ExperienceController::class, 'index']);
$router->post('/admin/experiences', [\App\Controllers\Admin\ExperienceController::class, 'store']);
$router->get('/admin/experiences/{id}/edit', [\App\Controllers\Admin\ExperienceController::class, 'edit']);
$router->post('/admin/experiences/{id}/edit', [\App\Controllers\Admin\ExperienceController::class, 'update']);
$router->post('/admin/experiences/{id}/delete', [\App\Controllers\Admin\ExperienceController::class, 'delete']);

// Settings
$router->get('/admin/settings', [\App\Controllers\Admin\SettingController::class, 'index']);
$router->post('/admin/settings', [\App\Controllers\Admin\SettingController::class, 'update']);
