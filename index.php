<?php

use App\Utilities\Url;

# front controller

include 'bootstrap/init.php';

$route = Url::currentRoute();
if ($route == '/pouya/blue')
    include BASE_PATH . 'views/colors/blue.php';

if ($route == '/pouya/red')
    include BASE_PATH . 'views/colors/red.php';

if ($route == '/atal/matal/tootoole')
    include BASE_PATH . 'views/colors/green.php';
