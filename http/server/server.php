<?php

/*
 * Serves the webpages
 */

require_once('../saved/page/pages/routes.php');
require_once('../http/utility/request.php');
require_once('../http/utility/logger.php');
require_once('../http/server/loader.php');

class Server
{
    // The ending url of the request
    private $request;
    
    private $loader;
    
    function __construct()
    {
        $this->request = new Request("index");
        $this->loader = new Loader();
    }
    
    function load_page($url)
    {
        $this->set_request(new Request($url));
        if(isset($GLOBALS['routes'][$this->request->get_url()]))
        {           
            $file_to_load = $GLOBALS['routes'][$this->request->get_url()];
            
            $this->loader->load_file($file_to_load);
         
        }
        else
        {
            deq_log_error('Invalid route requested, "' . $this->request->get_url() . '" is not a valid URL.');
            echo $this->loader->load_file('404.php');
        }
    }
    
    function set_request($request)
    {
        $this->request = $request;
    }
    
    function get_request()
    {
        return $this->request;
    }
    
}

?>


