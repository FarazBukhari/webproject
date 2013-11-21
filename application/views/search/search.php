<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
</head>
	<body>
		<div class = "profilecard">
			<?php   
				session_start();
				$name = $_SESSION['fname'];
				
				if(preg_match('/\s/',$name) == 1){
					$words = explode(" ", $name);

					$sql = "Select fname, lname, Picture FROM users WHERE fname LIKE '%" . $words[0] . "%' AND lname LIKE '%" . $words[1] ."%'";
	 				
	 				$res = mysql_query($sql);

	 				if /* or while */ ($row = mysql_fetch_assoc($res)) {
	 				    $fname = $row['fname'];
	 				    $lname = $row['lname'];
	 				    $fulltarget = $row['Picture'];
					}
				}
				
				else{
			
					$sql = "Select fname, lname, Picture FROM users WHERE fname LIKE '%" . $name . "%'";
	 				
	 				$res = mysql_query($sql);

	 				/*if */ while ($row = mysql_fetch_array($res)) {
	 				    $fname = $row['fname'];
	 				    echo $fname;
	 				    $lname = $row['lname'];
	 				    echo $lname;
	 				    $fulltarget = $row['Picture'];
 					}
 				}
 			?>
 			<div class = "Profilename1">
 			    <?php echo $fname;?> <?php echo $lname;?>
 			</div>

 			<div class = "pp">
 			    <?php echo "<img src='$fulltarget' class = 'pp'>";?>
			</div>
		
		</div>
	</body>
</html>
