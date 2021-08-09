<?php

require_once  __DIR__.'/vendor/autoload.php';

use app\Router;
use app\controllers\MainController;


$router = new Router();

$router->get('/',[MainController::class,'index']);
$router->get('/enemies',[MainController::class,'index']);
$router->get('/enemies/create',[MainController::class,'create']);
$router->post('/enemies/create',[MainController::class,'create']);
$router->get('/enemies/update',[MainController::class,'update']);
$router->post('/enemies/update',[MainController::class,'update']);
$router->post('/enemies/delete',[MainController::class,'delete']);

$router->resolve();
?>