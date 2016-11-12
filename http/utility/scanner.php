<?php

/*
 * Goes through a file and checks for commands and includes
 */

class Scanner
{
    public static function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);

        // None of starttag found
        if ($ini == 0)
            return '';

        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        // The string between start and stop
        return substr($string, $ini, $len);
    }
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
        $variable_operator = deq_get_setting('VARIABLE_OPERATOR');

        $actual_path = $pages_location . $file_path;
        $file = file($actual_path);

        foreach($file as $line_number => $line)
        {
           // Finds if there are a include on the current line with expression <+SOMETHING(SOMETHING="SOMETHING");
           // TODO: Implement a better regex to more accuretly find webdeq includes
           $pattern = '/(' . $include_operator . '[a-zA-Z0-9_-]+\([a-zA-Z0-9\,\"\=\_\-\ \<\>\/]*\);)/';
           $matches = Array();
           preg_match_all($pattern, $line, $matches);


            // Create array and store files in them
            for($i = 0; $i < count($matches[0]); $i++)
            {
                $filename = $matches[0][$i];
                $filename = ltrim($filename, '<+');
                $filename = rtrim($filename, ';');

                // Get the parameters before we butcher the data
                $parameters = scanner::get_string_between($filename, '(', ')');

                //trim the  right ( and ) and everythingbetween
                $filename = preg_replace("/\([^)]+\)/", "", $filename);
                $filename = rtrim($filename, ')'); // Just to be sure for empty ones
                $filename = rtrim($filename, '(');

                // Get the file contents into a temporary buffer so we can make changes before writing it to file
                $temp_file = file_get_contents($template_location . $filename . '.php');

                // Seperate parameters
                $parameters_array = explode(',', $parameters);

                foreach ($parameters_array as $key => $para) {
                    $param_arr = explode('=', $parameters_array[$key]);

                    // Get the name
                    $param_name = $param_arr[0];

                    // Trim whitespaces from name
                    $param_name = str_replace(" ", "", $param_name);

                    // Add the ; and <@
                    $param_name = $variable_operator . $param_name . ';';

                    // Retrieve the value
                    $param_value = str_replace("\"", "", $param_arr[1]);

                    $temp_file = str_replace($param_name, $param_value, $temp_file);
                }

                // Array splice to add the code to the file
                array_splice($file, $line_number, 1, $temp_file);
            }
        }

        // Make array into string
        $content = implode("\n", $file);

        // If caching is enabled write to file else return the content

        // Output the new file to the '$generated_location'
        file_put_contents($generated_location . $file_path, $content);

    }
}
