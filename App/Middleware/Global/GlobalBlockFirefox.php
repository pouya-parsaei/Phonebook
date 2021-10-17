<?php
namespace App\Middleware\Global;


use hisorange\BrowserDetect\Parser as Browser;
use App\Middleware\Contract\MiddlewareInterface;


class GlobalBlockFirefox implements MiddlewareInterface
{
    public function handle()
    {
        global $request;
        if (Browser::isFirefox()) {
            die('Block Firefox');
        }

    }
}
