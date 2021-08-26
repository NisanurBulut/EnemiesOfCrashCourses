<?php


use app\controllers\EnemyController;
use app\Router;
use app\Database;

require_once __DIR__ . '/vendor/autoload.php';

echo __DIR__;

$database = new Database();
$router = new Router($database);

$router->get('/', [EnemyController::class, 'index']);
$router->get('/enemy', [EnemyController::class, 'index']);
$router->get('/enemy/index', [EnemyController::class, 'index']);
$router->get('/enemy/create', [EnemyController::class, 'create']);
$router->post('/enemy/create', [EnemyController::class, 'create']);
$router->get('/enemy/update', [EnemyController::class, 'update']);
$router->post('/enemy/update', [EnemyController::class, 'update']);
$router->post('/enemy/delete', [EnemyController::class, 'delete']);

$router->resolve();