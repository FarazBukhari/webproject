<?php
	session_start();
	if( $name == "<some name>" && $pass == "<some password>" )
	{
	// Authentication successful - Set session
	   $_SESSION['auth'] = 1;
	   setcookie("username", $_POST['name'], time()+(84600*30));
	   header('Location: index.php');
	   exit();
	}
	else {
	  echo "ERROR: Incorrect username or password!";
	}

?>