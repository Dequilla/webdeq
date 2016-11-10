<?php

/*
 * Serves the webpages
 */

require_once('../saved/page/pages/routes.php');
require_once('../http/utility/logger.php');
require_once('../http/server/loader.php');

class Server
{
    // Gets the current uri (/index.php for example)
    public static function get_current_uri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');

        return $uri;
    }

    public static function load_page($url)
    {
        $file_to_load = deq_get_route($url);

        loader::load_file($file_to_load);
    }
}

?>
