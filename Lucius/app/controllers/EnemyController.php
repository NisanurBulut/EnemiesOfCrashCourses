<?php

namespace app\controllers;

use app\Router;
class EnemyController
{
    public function index(Router $router)
    {
        $keyword = $_GET['search'] ?? '';
        $enemies = $router->database->getEnemys($keyword);
        $router->renderView('enemies/index', [
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
            $enemyData['title'] = $_POST['title'];
            $enemyData['description'] = $_POST['description'];
            $enemyData['price'] = $_POST['price'];
            $enemyData['imageFile'] = $_FILES['image'] ?? null;

            $enemy = new Enemy();
            $enemy->load($enemyData);
            $enemy->save();
            header('Location: /enemies');
            exit;
        }
        $router->renderView('enemies/create', [
            'enemy' => $enemyData
        ]);
    }

    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /enemies');
            exit;
        }
        $enemyData = $router->database->getEnemyById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $enemyData['title'] = $_POST['title'];
            $enemyData['description'] = $_POST['description'];
            $enemyData['price'] = $_POST['price'];
            $enemyData['imageFile'] = $_FILES['image'] ?? null;

            $enemy = new Enemy();
            $enemy->load($enemyData);
            $enemy->save();
            header('Location: /enemies');
            exit;
        }

        $router->renderView('enemies/update', [
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