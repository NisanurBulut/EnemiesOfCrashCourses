<?php

require_once __DIR__ . './vendor/autoload.php';

use app\controllers\EnemyController;
use app\core\Router;
use app\core\Database;


$database = new Database();
$router = new Router($database);

$router->get('/', [EnemyController::class, 'index']);
$router->get('/enemy', [EnemyController::class, 'index']);
$router->get('/enemy/create', [EnemyController::class, 'create']);
$router->post('/enemy/create', [EnemyController::class, 'create']);
$router->get('/enemy/update', [EnemyController::class, 'update']);
$router->post('/enemy/update', [EnemyController::class, 'update']);
$router->post('/enemy/delete', [EnemyController::class, 'delete']);

$router->resolve();