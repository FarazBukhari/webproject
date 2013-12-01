<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header1.css')?>" rel="stylesheet">
</head>
	<body>

		<div class = "profilecard">
			<?php 
			
			$sql = "Select * FROM friendlist WHERE reciever = '" .$_SESSION['result']."' AND status = 'pending'";
			$res = mysql_query($sql);
			while ($row = mysql_fetch_array($res)) {
	 				    $username = $row['sender'];
	 				    $sql = "Select * FROM users WHERE username = '".$username."'";
	 				    $res1 = mysql_query($sql);
	 				    if /* or while */ ($row1 = mysql_fetch_assoc($res1)){
	 				    	$fname=$row1['fname'];
	 				    $lname = $row1['lname'];
	 				    
	 				    $fulltarget = $row1['Picture'];
	 				    
	 				    echo "<div class = 'Profilename1'>";
   			    		echo "<img src='$fulltarget' class = 'pp'>";
 						echo "	<a href="; echo base_url('index.php/login/login/profile');echo "?username=";echo $username; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo $fname; echo " "; echo $lname;
 						

						echo "</div></a>";
					}


			}
			?>
		</div>

	</body>
</html>