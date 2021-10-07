<?php

namespace App\Utilities;

use Exception;

class Asset
{
    public static function get(string $route)
    {
        return $_ENV['HOST'] . 'assets/' . $route;
    }

    public static function __callStatic(string $name, array $arguments)
    {
        return $_ENV['HOST'] . "assets/{$name}/{$arguments[0]}";
    }
}
