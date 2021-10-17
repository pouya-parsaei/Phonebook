<?php
namespace App\Controllers;

use App\Middleware\Contract\MiddlewareInterface;

class PanelController implements MiddlewareInterface
{
    public function handle()
     {
    //     if(!Auth::isLogin())
    //     redirect('/login');
     }
}