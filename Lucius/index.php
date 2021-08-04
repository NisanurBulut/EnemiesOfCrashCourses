<?php 
require_once "./vendor/autoload.php";
use app\controllers\MainController;
use app\Router;
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