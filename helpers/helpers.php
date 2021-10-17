<?php

function site_url(string $route = ''): string
{
    return $_ENV['HOST'] . $route;
}

function asset_url(string $route = ''): string
{
    return site_url('assets/' . $route);
}

function view($path, $data = []) #errors.404
{
    extract($data);
    $path = str_replace('.', '/', $path);
    $viewFullPath = BASE_PATH . "views/$path.php";
    include_once $viewFullPath;
}
function viewDie($path, $data = []) #errors.404
{
    view($path, $data);
    die();
}

function strContains($str, $needle, $case_sensitive = 0)
{
    if ($case_sensitive)
        $pos = strpos($str, $needle);
    else
        $pos = stripos($str, $needle);
    return ($pos !== false) ? true : false;
}

function xss_clean($str)
{
    return filter_var(htmlspecialchars($str), FILTER_SANITIZE_STRING);
}

function niceDump($var)
{
    echo "<pre style='display: block; text-align: left;direction: ltr; background-color:#fff; border:1px solid red";
    var_dump($var);
    echo '</pre>';
}

function niceDd($var)
{
    niceDump($var);
    die();
}
