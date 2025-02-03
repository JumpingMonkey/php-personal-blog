<?php

namespace App;

class Router
{
    private array $routes = [];

    public function get(string $path, array $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, array $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $routes = $this->routes[$method] ?? [];
        
        foreach ($routes as $routePath => $callback) {
            $pattern = $this->convertRouteToRegex($routePath);
            if (preg_match($pattern, $path, $matches)) {
                array_shift($matches); // Remove the full match
                $controller = new $callback[0]();
                call_user_func_array([$controller, $callback[1]], $matches);
                return;
            }
        }
        
        $this->renderNotFound();
    }

    private function convertRouteToRegex(string $route): string
    {
        return '#^' . preg_replace('/\{([a-zA-Z]+)\}/', '([^/]+)', $route) . '$#';
    }

    private function renderNotFound(): void
    {
        http_response_code(404);
        require __DIR__ . '/../templates/404.php';
    }
}
