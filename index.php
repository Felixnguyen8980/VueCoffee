<?php
	ob_start();
	session_start();
	include  'controller.php';
	$view = new controller();
	$view->handle_request();
	ob_end_flush();
	
?>
