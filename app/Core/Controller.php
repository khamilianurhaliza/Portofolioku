<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        extract($data);
        $viewPath = BASE_PATH . '/app/Views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View {$view} not found!");
        }
    }

    protected function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }
}
