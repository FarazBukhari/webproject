<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
</head>
	<body>
		<?php
		//echo $_SESSION['result'];
		//$sql = "Select * FROM friendlist WHERE sender = '".$_SESSION['hello']."' AND reciever='".$_SESSION['superusername']."'";
		$query = "Select * FROM friendlist WHERE reciever = '" .$_SESSION['result']."' AND status = 'pending'";
		$result = mysql_query($query);
		$row = mysql_num_rows($result);
		if($row > 0) { // there are new requests
			//echo "	<a href="; echo base_url('index.php/login/login/requests'); echo "?username=";echo $username; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo $fname; echo " "; echo $lname;
			echo "<h3><Center>";
			echo "	<a href="; echo base_url('index.php/login/login/requests'); echo ">"; echo "You have ".$row." new friend requests"; echo "</a>";
			echo "</Center></h3>";
		}
		else {
			echo "No new requests.";
		}
		?>
	</body>
</html>