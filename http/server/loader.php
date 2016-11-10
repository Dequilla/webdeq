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


        // If caching is enabled try just loading the generated file
        if($caching)
        {
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
        }
        else // Caching is disabled load don't save generated pages
        {
            // Delete the generated file because we really don't want them hanging around if
            // We have caching disabled
            if(file_exists($generated_location . $file_name))
            {
                // Unlink deletes the file
                unlink($generated_location . $file_name);
            }

            if(file_exists($pages_location . $file_name))
            {
                $content = scanner::scan($file_name);
            }


            echo $content;
        }
    }
}
