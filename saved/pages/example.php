<?php
/* 
 * Example/experimental file for generating pages
 */
?>

<html>
    <head>
    
        <!-- Need to figure out a good start for my commands -->
        <+template(cssAndJs);
        <!-- Maybe even only -->
        <+nameOfTemplate;
        <!-- and for other commands <# -->
        <!-- Then id need a nice way to seperate variables -->
        <#commandName,variable,variable2;
        <#commandName(variable,variable2);
        
    </head>
    <body>
        
            <+header;

            <?php
                echo "I can have php code inbetween"
            ?>
            
            <p>
                Or just regular html like usual
            </p>
            
            <+footer;
        
    </body>
</html>

