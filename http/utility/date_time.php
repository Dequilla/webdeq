<?php

/* 
 * Keeps track of time
 */

require_once('../http/settings/settings.php');

function get_current_date_as_string($format = 'd/m/Y-h:i:s')
{
    date_default_timezone_set($GLOBALS['_DEQ_SETTINGS_']['DEFAULT_TIMEZONE']);
    $date = date($format);
    return $date;
}

class deq_date
{   
    // TODO -- Finish
    
    private $year = 2000;
    private $month = 12;
    private $day = 30;
    
    private $hour = 24;
    private $minute = 60;
    private $second = 60;
    
    function __construct()
    {
        date_default_timezone_set($GLOBALS['settings']['DEFAULT_TIMEZONE']);
    }
    
    function __construct1($date)
    {
        //TODO -- Implement
        date_default_timezone_set($GLOBALS['settings']['DEFAULT_TIMEZONE']);
    }
    
    function set_date()
    {
        
    }
    
    function get_date()
    {
        
    }
    
    function get_date_time()
    {
        
    }
}

?>