<?php

use App\Core\StupidRouter;

# front controller

include 'bootstrap/init.php';

$router = new StupidRouter();
$router->run();
