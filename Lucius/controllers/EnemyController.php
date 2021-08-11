<?php

namespace app\controllers;

use app\core\Router;

class EnemyController
{
    public static function index(Router $router)
    {
        $keyword = $_GET['search'] ?? '';
        $enemies = $router->database->getEnemies($keyword);
        $router->renderView('/index', [
            'enemies' => $enemies,
            'keyword' => $keyword
        ]);
    }

    public function create(Router $router)
    {
        $enemyData = [
            'image' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $enemyData['name'] = $_POST['name'];
            $enemyData['description'] = $_POST['description'];
            $enemyData['movie'] = $_POST['movie'];
            $enemyData['imageFile'] = $_FILES['image'] ?? null;

            $enemy = new Enemy();
            $enemy->load($enemyData);
            $enemy->save();
            header('Location: /enemy');
            exit;
        }
        $router->renderView('/create', [
            'enemy' => $enemyData
        ]);
    }

    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /enemy');
            exit;
        }
        $enemyData = $router->database->getEnemyById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $enemyData['name'] = $_POST['name'];
            $enemyData['description'] = $_POST['description'];
            $enemyData['movie'] = $_POST['movie'];
            $enemyData['imageFile'] = $_FILES['image'] ?? null;

            $enemy = new Enemy();
            $enemy->load($enemyData);
            $enemy->save();
            header('Location: /enemy');
            exit;
        }

        $router->renderView('/update', [
            'enemy' => $enemyData
        ]);
    }

    public function delete(Router $router)
    {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /enemies');
            exit;
        }

        if ($router->database->deleteEnemy($id)) {
            header('Location: /enemies');
            exit;
        }
    }
}