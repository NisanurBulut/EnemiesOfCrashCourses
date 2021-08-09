<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\Router;
use app\controllers\EnemyController;


$router = new Router();

$router->get('/', [EnemyController::class, 'index']);
$router->get('/enemies', [EnemyController::class, 'index']);
$router->get('/enemies/create', [EnemyController::class, 'create']);
$router->post('/enemies/create', [EnemyController::class, 'create']);
$router->get('/enemies/update', [EnemyController::class, 'update']);
$router->post('/enemies/update', [EnemyController::class, 'update']);
$router->post('/enemies/delete', [EnemyController::class, 'delete']);

$router->resolve();