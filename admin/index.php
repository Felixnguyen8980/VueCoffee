
<?php
	ob_start();
	session_start();
	include ('controller/controller.php');
	$controller = new controllerAdmin();
	$action = isset($_GET['action'])? $_GET['action']:NULL;
	$controller->handle_request($action);
	ob_end_flush();
?>
