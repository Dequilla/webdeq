<?php

/* 
 * Loads the files for the server
 */

require_once('../http/utility/scanner.php');
require_once('../http/utility/logger.php');

class Loader
{
    private $pages_location = '../saved/page/pages/';
    
    private $generated_location = '../saved/page/generated/';
    
    private $scanner;
    
    function __construct()
    { 
        $this->scanner = new Scanner;
    }
    
    function load_file($file_name)
    {
        // If there is a generated file, just serve that
        if(file_exists($this->generated_location . $file_name))
        {
            $file_content = file_get_contents($this->generated_location . $file_name);
            
            include($this->generated_location . $file_name);
        }
        else
        {
            // Else if no generated page exists generate one and serve it
            if(file_exists($this->pages_location . $file_name))
            {
                $this->scanner->scan($file_name);
                
                deq_log_message($file_name . ' has not yet been generated, generating if possible.');
                
                // Force new request to load generated page
                header("Refresh:0");
                die();
            }
        }      
    }
}