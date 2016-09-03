<?php

include_once('utility/classes/formatter.php');


/* 
 * Goes through a file and checks for commands and includes
 */


class Scanner 
{
    // The file of which should be scanned
    private $file = Array();
    
    // The location of where to load the pages containing un-generated code
    private $pagesLocation = "saved/pages/";
    
    // Location of templates
    private $templateLocation = "saved/templates/";

    // Location of generated files
    private $generatedLocation = "saved/generated/";
    
    // "paste" operator escaped
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
     * and eventually saves the generated page in /saved/generated/
     */
    function scan($filePath)
    {
       $actualPath = $this->pagesLocation . $filePath;
       $this->file = file($actualPath);
       
       foreach($this->file as $line_number => $line)
       {
           // Finds if there are a include on the current line
           $pattern = "/(" . $this->includeOperator . "[a-zA-Z0-9_-]+;)/";
           $matches = Array();
           preg_match_all($pattern, $line, $matches);

           // Create array and store files in them
           for($i = 0; $i < count($matches[0]); $i++)
           {
               $filename = $matches[0][$i];
               $filename = ltrim($filename, "<+");
               $filename = rtrim($filename, ";");
               
               // For the moment it has to have the .php ending
               $tempFile = file_get_contents($this->templateLocation . $filename . ".php");
               
               // Array splice to add the code to the file
               array_splice($this->file, $line_number, 1, $tempFile);
           } 
        }
        
        // Format html
        $content = implode("\n", $this->file);
        
        // Output the new file to the "generatedLocation"
        file_put_contents($this->generatedLocation . $filePath, $content);
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
