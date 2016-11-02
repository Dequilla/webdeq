<?php

/* 
 * Goes through a file and checks for commands and includes
 */

class Scanner 
{
    // The file of which should be scanned
    private $file = Array();
    
    // The location of where to load the pages containing un-generated code
    private $pages_location = '../saved/page/pages/';
    
    // Location of templates
    private $template_location = '../saved/page/templates/';

    // Location of generated files
    private $generated_location = '../saved/page/generated/';
    
    // 'paste' operator escaped
    private $include_operator = '\<\+';
    
    // This is still a concept to be worked on
    private $command_operator = '\<\#';
    
    function __construct() 
    {
    }
    
    /*
     * This function does the actual scan and checks for commands and then pastes in what is needed
     * and eventually saves the generated page in /saved/generated/
     */
    function scan($file_path)
    {
       $actual_path = $this->pages_location . $file_path;
       $this->file = file($actual_path);
       
       foreach($this->file as $line_number => $line)
       {
           // Finds if there are a include on the current line
           $pattern = '/(' . $this->include_operator . '[a-zA-Z0-9_-]+;)/';
           $matches = Array();
           preg_match_all($pattern, $line, $matches);

           // Create array and store files in them
           for($i = 0; $i < count($matches[0]); $i++)
           {
               $filename = $matches[0][$i];
               $filename = ltrim($filename, '<+');
               $filename = rtrim($filename, ';');
               
               // For the moment it has to have the .php ending
               $temp_file = file_get_contents($this->template_location . $filename . '.php');
               
               // Array splice to add the code to the file
               array_splice($this->file, $line_number, 1, $temp_file);
           } 
        }
        
        // Format html
        $content = implode("\n", $this->file);
        
        // Output the new file to the '$generated_location'
        file_put_contents($this->generated_location . $file_path, $content);
    }
    
    /*
    * This function is for changing what kind of starting-string the 
    * Includes should have, by default it is '<+'
    */
    function set_include_operator($new_id)
    {
        // These should always be two characters to remove confusion with other languages or alike

        // TODO: Solve this some time
        
    }
    
    function set_command_operator($new_id)
    {
        // These should always be two characters to remove confusion with other languages or alike
    }
    
    
}
