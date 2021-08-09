<?php

namespace app\controllers;

use app\Router;

class EnemyController
{
    public function index(Router $router)
    {
        $enemies = $router->db->getEnemies();
        $router->renderView('enemies/index', [
            'enemies' => $enemies
        ]);
    }
}