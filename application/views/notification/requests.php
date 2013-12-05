<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header1.css')?>" rel="stylesheet">
</head>
	<body>

		<div class = "profilecard">
			<?php 
			//session_start();
			// $sql = "Select * FROM friendlist WHERE reciever = '" .$_SESSION['result']."' AND status = 'pending'";
			// $res = mysql_query($sql);
			$dis=$_SESSION['disp'];
			$i=0;
			$sized=sizeof($dis);
			while ($sized>0) {
	 				    $username = $dis[$i]['username'];
	 				    $fname=$dis[$i]['fname'];
	 				    //$sql = "Select * FROM users WHERE username = '".$username."'";
	 				    //$res1 = mysql_query($sql);
	 				    //if /* or while */ ($row1 = mysql_fetch_assoc($res1)){
	 				   // $fname=$$dis[$i]['fname'];
	 				    $lname = $dis[$i]['lname'];
	 				    
	 				    $fulltarget = $dis[$i]['Picture'];
	 				    
	 				    echo "<div class = 'Profilename1'>";
   			    		echo "<img src='$fulltarget' class = 'pp'>";
 						echo "	<a href="; echo base_url('index.php/login/login/profile');echo "?username=";echo $username; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo $fname; echo " "; echo $lname;
 						

						echo "</div></a>";
						$i++;
						$sized--;
					//}


			}
			?>
		</div>

	</body>
</html>