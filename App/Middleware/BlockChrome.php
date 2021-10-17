<?php

namespace App\Middleware;

use hisorange\BrowserDetect\Parser as Browser;
use App\Middleware\Contract\MiddlewareInterface;


class BlockChrome implements MiddlewareInterface
{
    public function handle()
    {
        global $request;
        if (Browser::isChrome()) {
            die('Block chrome');
        }
    }
}
