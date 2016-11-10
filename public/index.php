<?php
    require_once('../http/utility/logger.php');
    require_once('../http/server/server.php');

    $page = server::get_current_uri();
    server::load_page($page);
    
    deq_log_message('Request for page: ' . $page . '.');
?>
