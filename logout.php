<?php
	session_start();
	unset($_SESSION);
	session_destroy();
	session_write_close();
	header('Location: http://localhost:8080/Codeigniter-bootstrap--master/index.php/login/login/index');
	die;
	// session_destroy();
	// header("Location: http://localhost:8080/Codeigniter-bootstrap--master/index.php/login/login/after");

	// exit;
?>