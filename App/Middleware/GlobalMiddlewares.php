<?php

namespace App\Middleware;


class GlobalMiddlewares
{
   
    protected $globalMiddleware = [
        \App\Middleware\Global\GlobalBlockFirefox::class,
        \App\Middleware\Global\GlobalSanitizeGetParams::class
    ];


	public function getGlobalMiddlewares()

	{
		return $this->globalMiddleware ;

	}
}

