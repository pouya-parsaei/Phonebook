<?php
namespace App\Middleware\Global;

use App\Middleware\Contract\MiddlewareInterface;

class GlobalSanitizeGetParams implements MiddlewareInterface
{
    public function handle()
    {
        foreach ($_GET as $key => $value) {
            $_GET[$key] = xss_clean($value);
        }
    }
}
