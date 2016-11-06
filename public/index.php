<?php
  require_once('../http/utility/scanner.php');
  require_once('../http/utility/logger.php');
  require_once('../http/server/server.php');

  function getCurrentUri() {
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
		$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		$uri = '/' . trim($uri, '/');
		return $uri;
  }

    $scanner = new Scanner();
    $server = new Server();
    $page = getCurrentUri();
    $server->load_page($page);
    deq_log_message('Request for page: ' . $page . '.');
?>
