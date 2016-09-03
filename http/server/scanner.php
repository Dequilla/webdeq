<?php

/* 
 * Goes through a file and checks for commands and includes
 */


class Scanner 
{
    // The file of which should be scanned
    private $file;
    
    // The location of where to load the pages containing un-generated code
    private $pagesLocation = "saved/pages/";
    
    // Location of templates
    private $templateLocation = "saved/templates/";
    
    // "paste" operator
    private $includeOperator = '\<\+';
    
    // This is still a concept to be worked on
    private $commandOperator = '\<\#';
    
    function __construct() 
    {
    }
    
    private function loadTemplate($templateName)
    {
        $actualPath = $this->templateLocation . $templateName . "php";
        $file = file($actualPath);
        
        return $file;
    }
    
    /*
     * This function does the actual scan and checks for commands and then pastes in what is needed
     */
    function scan($filePath)
    {
       $actualPath = $this->pagesLocation . $filePath;
       $this->file = file($actualPath);
       
       foreach($this->file as $line_number => $line)
       {
           /*
           $length = strlen($line);
           for($i = 0; $i < $length; $i++)
           {
               // TODO: Put in a system that makes sure to ignore comments
               if($line[$i] == $this->includeOperator[0] && $line[$i+1] == $this->includeOperator[1])
               {
                   echo "Found line with include command:" . $line;
                   
                   // First remove current line from file array
                   // For each line in template array_splice($file, $line_number, template_file_array); 

                   // Go through and find the name of the template
                   for($x = 0; $x < $length; $x++)
                   {
                       
                   }
                   
                   
               }
               
               if($line[$i] == $this->commandOperator[0] && $line[$i+1] == $this->commandOperator[1])
               {
                   echo "Found line with command:" . $line;
               }

           }
           */
           
           // Try doing above with regex
           $pattern = "/(" . $this->includeOperator . "[a-zA-Z0-9]+;)/";
           $matches = Array();
           preg_match_all($pattern, $line, $matches);
           echo count($matches[0]);
           print_r($matches);
           echo "<br>";
           
           // Create array and store files in them
           //$includeFiles = file()
       }
    }
    
    /*
    * This function is for changing what kind of starting-string the 
    * Includes should have, by default it is "<+"
    */
    function setIncludeOperator($newId)
    {
        // These should always be two characters to remove confusion with other languages or alike

        // TODO: Solve this some time
        
    }
    
    function setCommandOperator($newId)
    {
        // These should always be two characters to remove confusion with other languages or alike
    }
    
    
}
