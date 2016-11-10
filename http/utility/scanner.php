<?php

/*
 * Goes through a file and checks for commands and includes
 */

class Scanner
{
    /*
     * This function does the actual scan and checks for commands and then pastes in what is needed
     * and eventually saves the generated page in /saved/generated/
     */
    public static function scan($file_path)
    {
        // Retrieve the variables we will use
        $pages_location = deq_get_setting('PAGES_LOCATION');
        $generated_location = deq_get_setting('GENERATED_LOCATION');
        $template_location = deq_get_setting('TEMPLATE_LOCATION');

        $include_operator = deq_get_setting('INCLUDE_OPERATOR');

        $actual_path = $pages_location . $file_path;
        $file = file($actual_path);

        foreach($file as $line_number => $line)
        {
           // Finds if there are a include on the current line
           $pattern = '/(' . $include_operator . '[a-zA-Z0-9_-]+;)/';
           $matches = Array();
           preg_match_all($pattern, $line, $matches);

            // Create array and store files in them
            for($i = 0; $i < count($matches[0]); $i++)
            {
               $filename = $matches[0][$i];
               $filename = ltrim($filename, '<+');
               $filename = rtrim($filename, ';');

               // Get the file contents into a temporary buffer
               $temp_file = file_get_contents($template_location . $filename . '.php');

               // Array splice to add the code to the file
               array_splice($file, $line_number, 1, $temp_file);
            }
        }

        // Make array into string
        $content = implode("\n", $file);

        // If caching is enabled write to file else return the content
        if(deq_get_setting('CACHING_ENABLED'))
        {
            // Output the new file to the '$generated_location'
            file_put_contents($generated_location . $file_path, $content);
        }
        else
        {
            return $content;
        }

    }
}
