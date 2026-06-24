<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, array|callable $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array|callable $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(string $method, string $uri, array|callable $action)
    {
        // Convert route params like {id} to regex
        $uriPattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $uri);
        $uriPattern = '#^' . $uriPattern . '$#';

        $this->routes[] = [
            'method' => $method,
            'pattern' => $uriPattern,
            'action' => $action
        ];
    }

    public function dispatch(string $uri, string $method)
    {
        $uri = rtrim($uri, '/');
        if (empty($uri)) {
            $uri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['pattern'], $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (is_callable($route['action'])) {
                    return call_user_func_array($route['action'], $params);
                }

                if (is_array($route['action'])) {
                    [$controllerClass, $methodName] = $route['action'];
                    
                    if (class_exists($controllerClass)) {
                        $controller = new $controllerClass();
                        if (method_exists($controller, $methodName)) {
                            return call_user_func_array([$controller, $methodName], $params);
                        }
                    }
                }
            }
        }

        // 404 Handler
        http_response_code(404);
        echo "404 Not Found";
        exit;
    }
}
