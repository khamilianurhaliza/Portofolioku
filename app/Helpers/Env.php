<?php

namespace App\Helpers;

class Env
{
    private static array $variables = [];
    private static bool $loaded = false;

    public static function load(string $path)
    {
        if (!file_exists($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);

                // Remove surrounding quotes if any
                if (preg_match('/^"(.*)"$/', $value, $matches) || preg_match("/^'(.*)'$/", $value, $matches)) {
                    $value = $matches[1];
                }

                self::$variables[$name] = $value;
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
        self::$loaded = true;
    }

    public static function get(string $key, $default = null)
    {
        if (!self::$loaded && defined('BASE_PATH')) {
            self::load(BASE_PATH . '/.env');
        }

        return self::$variables[$key] ?? $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key) ?: $default;
    }
}
