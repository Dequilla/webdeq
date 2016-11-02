<?php

/*
 * Logging class, errors, useful information, logg it via this 
 */

require_once('../http/settings/settings.php');
require_once('../http/utility/date_time.php');

//TODO -- reconsider redesigning this, alot of duplicate code

// Array or string of error messages
function deq_log_error($messages)
{    
    if($GLOBALS['_DEQ_SETTINGS_']['LOGGING_ENABLED'])
    {
        $log_path = $GLOBALS['_DEQ_SETTINGS_']['LOG_DIR'] . 'error_log.txt';
            
        if(is_string($messages))
        {
            $actual_message = 'ERROR: ' . get_current_date_as_string() . ' <> From IP: ' . $_SERVER['REMOTE_ADDR'] . ' <> ' . $messages;
            error_log($actual_message . "\n", 3, $log_path);
        }
        elseif(is_array($messages))
        {
           foreach($messages as $message_num => $message)
           {
               $actual_message = 'ERROR: ' . get_current_date_as_string() . ' <> From IP: ' . $_SERVER['REMOTE_ADDR'] . ' <> ' . $message;
               error_log($actual_message . "\n", 3, $log_path);
           }
        }
        else
        { 
            // Not valid error message type, should be string or array
            deq_log_error('Invalid type of message sent to logger, logger only takes string and array. ' . gettype($messages) . ' was sent.');
        }
    }
}

function deq_log_message($messages)
{
    if($GLOBALS['_DEQ_SETTINGS_']['LOGGING_ENABLED'])
    {
        $log_path = $GLOBALS['_DEQ_SETTINGS_']['LOG_DIR'] . 'message_log.txt';
     
        if(is_string($messages))
        {
            $actual_message = 'MESSAGE: ' . get_current_date_as_string() . ' <> From IP: ' . $_SERVER['REMOTE_ADDR'] . ' <> ' . $messages;
            error_log($actual_message . "\n", 3, $log_path);
        }
        elseif(is_array($messages))
        {
           foreach($messages as $message_num => $message)
           {
                $actual_message = 'MESSAGE: ' . get_current_date_as_string() . ' <> From IP: ' . $_SERVER['REMOTE_ADDR'] . ' <> ' . $message;
                error_log($actual_message . "\n", 3, $log_path);
           }
        }
        else
        { 
            // Not valid error message type, should be string or array
            deq_log_error('Invalid type of message sent to logger, logger only takes strings and arrays. ' . gettype($messages) . ' was sent.');
        }
    }
}

?>
