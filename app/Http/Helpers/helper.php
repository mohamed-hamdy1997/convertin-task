<?php

use \Illuminate\Support\Facades\Route;

function isActiveRoute($route, $output = "active")
{
    $route = is_array($route) ? $route : [$route];
    if (in_array(Route::currentRouteName(), $route)) return $output;
}
