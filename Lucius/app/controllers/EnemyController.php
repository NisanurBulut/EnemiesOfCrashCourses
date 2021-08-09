<?php

namespace app\controllers;

use app\Router;

class EnemyController
{
    public function index(Router $router)
    {
        $router->renderView('enemies/index');
    }
}