<?php

/*
 * This file contains the paths for your pages
 * This file is needed for webdeq to function
 */

$_DEQ_ROUTES_ = [
//  Route           File
    '/'          => 'index.php',
];

function deq_get_route($route_uri)
{
    if(isset($GLOBALS['_DEQ_ROUTES_'][$route_uri]))
    {
        $routes = $GLOBALS['_DEQ_ROUTES_'];

        return $routes[$route_uri];
    }
    else
    {
        return '404.php';
    }
}

?>
