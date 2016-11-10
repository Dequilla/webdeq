<?php

/*
 * Logging class, errors, useful information, log it via this
 */

require_once('../http/settings/settings.php');
require_once('../http/utility/date_time.php');

//TODO -- reconsider redesigning this, alot of duplicate code

// What to log then the file(not path)
// Messages can be an array
function deq_log($messages, $log_file)
{
    if(deq_get_setting('LOGGING_ENABLED'))
    {
        $log_path = deq_get_setting('LOG_DIR') . $log_file;

        if(is_string($messages))
        {
            error_log($messages . "\n", 3, $log_path);
        }
        elseif(is_array($messages))
        {
            foreach($messages as $message_num => $message)
            {
                // Make sure it is still a string even if it is a
                if(is_string($message))
                {
                    error_log($message . "\n", 3, $log_path);
                }
                else
                {
                    // Error type sent to log is not string
                    deq_log_error('Invalid error message type, deq_log only takes strings or arrays of strings.');
                }
            }

        }
        else
        {
            // Error type sent to log is not string
            deq_log_error('Invalid error message type, deq_log only takes strings or arrays of strings.');
        }
    }
}

// Array or string of error messages
function deq_log_error($messages)
{
    $log_file = 'error_log.txt';

    $actual_message = 'ERROR: ' . get_current_date_as_string() . ' <> From IP: ' . $_SERVER['REMOTE_ADDR'] . ' <> ' . $messages;

    deq_log($actual_message, $log_file);
}

function deq_log_message($messages)
{
    $log_file = 'message_log.txt';

    $actual_message = 'MESSAGE: ' . get_current_date_as_string() . ' <> From IP: ' . $_SERVER['REMOTE_ADDR'] . ' <> ' . $messages;

    deq_log($actual_message, $log_file);
}

?>
