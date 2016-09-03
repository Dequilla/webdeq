<html>
    <head>
        
    </head>
    <body>
        
        
        
        <h1>
        <?php
        
        require_once('/http/server/scanner.php');
        
        $scanner = new Scanner();
        
        $scanner->scan('test.php');
        
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
            echo $page;
        }
        
        ?>
        </h1>
        
    </body>
</html>