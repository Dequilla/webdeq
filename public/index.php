/*
* Edwin Wallin
* Github: https://github.com/Dequilla
* Website: http://dequilla.com or http://edwinwallin.com
* Email: edwin.wallin@dequilla.com
*
* Pontus Nilson
* Github: https://github.com/tazthemaniac
* Website: http://pontusnilsson.com or http://tazthemaniac.com
* Email: pontus_nilsson_92@hotmail.com
*/

<?php
    require_once('../http/utility/logger.php');
    require_once('../http/server/server.php');

    $page = server::get_current_uri();
    server::load_page($page);

    deq_log_message('Request for page: ' . $page . '.');
?>
