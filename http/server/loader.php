<?php

/*
 * Loads the files for the server and calls the scanner if needed
 */

require_once('../http/settings/settings.php');
require_once('../http/utility/scanner.php');
require_once('../http/utility/logger.php');

class Loader
{
    public static function load_file($file_name)
    {
        $generated_location = deq_get_setting("GENERATED_LOCATION"); // Retrieve the location to save generated files to
        $pages_location = deq_get_setting("PAGES_LOCATION"); // Retrieve the location pages are located

        $caching = deq_get_setting('CACHING_ENABLED');
        $content = '';

        // Before loading and generating the files
        // Check if caching is enabled and if it is not
        // Remove it to not clash
        if(!$caching)
        {
            if(file_exists($generated_location . $file_name))
            {
                // Unlink deletes the file
                unlink($generated_location . $file_name);
            }
        }

        // If there is a generated file, pass the generation stage
        if(!file_exists($generated_location . $file_name))
        {
            // If no generated page exists generate one and serve it
            // Make sure there is actually a page name $file_name
            if(file_exists($pages_location . $file_name))
            {
                scanner::scan($file_name);
            }
        }

        // Now present / include the generated page
        include($generated_location . $file_name);

        // Delete the generated file if caching is disabled
        if(!$caching)
        {
            if(file_exists($generated_location . $file_name))
            {
                // Unlink deletes the file
                unlink($generated_location . $file_name);
            }
        }
    }
}
