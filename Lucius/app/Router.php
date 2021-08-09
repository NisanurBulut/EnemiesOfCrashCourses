<?php

namespace app;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];


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
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else if ($method === 'POST') {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo 'Page Not Found';
        }
    }

    public function renderView($view)
    {
        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . "/views/shared/_layout.php";
    }
}