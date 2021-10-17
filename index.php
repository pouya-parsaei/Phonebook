<?php

use App\Models\User;
use App\Models\Product;
use App\Core\Routing\Router;


# front controller

include 'bootstrap/init.php';


$router = new Router($request);
$router->run();