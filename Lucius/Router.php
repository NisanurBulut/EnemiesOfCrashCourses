<?php


namespace app;

use app\controllers\EnemyController;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];
    public ?Database $database = null;

    public function __construct()
    {
        $this->database = new Database();
    }
    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }
        if (!$fn) {
            echo 'Page not found';
            exit;
        }
        // echo call_user_func($fn, $this);

        if($fn) {
            $enemyController = new EnemyController();
            call_user_func($fn, $this);
        } else {
            echo "404 ! Page not Found";
        }
    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ ."/views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/views/shared/_layout.php";
    }
}