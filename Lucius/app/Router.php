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
            $fn = getRoutes[$currentUrl] ?? null;
        } else if ($method === 'POST') {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }
    }
}