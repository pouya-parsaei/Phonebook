<?php

function site_url(string $route):string
{
    return $_ENV['HOST'] . $route;
}

function asset_url(string $route):string
{
    return site_url('assets/'.$route);
}

function random_element($arr)
{
    shuffle($arr);
    return array_pop($arr);
}
