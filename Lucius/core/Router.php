<?php


namespace app\core;
use app\core\Database;

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

        echo call_user_func($fn, $this);
    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/../views/enemy/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . "../views/shared/_layout.php";
    }
}