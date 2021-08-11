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
echo  $url;
        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }
        if (!$fn) {
            echo 'Page not found';
            exit;
        }

        echo var_dump($fn);
        echo call_user_func($fn, $this);
    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        echo $view;
        echo  var_dump($params);
        ob_start();
        include __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/../views/shared/_layout.php";
    }
}