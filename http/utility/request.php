<?php

/* 
 * A class representing a request for a page
 * Currently only a url but could be useful for more
 */

class Request
{
    // The suffix of the url (After the /
    private $url = 'index';
    
    function __construct($url = 'index')
    {
        $this->url = $url;
    }
    
    function get_url()
    {
        return $this->url;
    }
    
    function set_url($url)
    {
        $this->url = $url;
    }
}

?>

