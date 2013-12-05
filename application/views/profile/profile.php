<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
</head>
<body>
	<div class = "profilecard">
		<?php
		
		
	

		$proid=$_SESSION['superusername'];
		$fname1 = $_SESSION['fname1'];
		$lname1 = $_SESSION['lname1'];
		$fulltarget1 = $_SESSION['target1'];
		$frnds=$_SESSION['frndship'];
		$sizef=sizeof($frnds);
		session_start();
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$fulltarget = $_SESSION['target'];
	
		?>

		<div class = "Profilename1">
			<?php echo $fname1;?> <?php echo $lname1;?> 
		</div>

		<div class = "pp">
			<?php echo "<img src='$fulltarget1' class = 'pp'>";?>
		</div>

		<div class = "dpchange">
			<!-- <a href = "<?php echo base_url('/index.php/login/login/addfriend')?>?id1=<?php echo $_SESSION['result']; ?>&id2=<?php echo $_SESSION['superusername'];?>&fname=<?php echo $fname1; ?>"> -->
			<?php


			// $this->db->where('sender', $_SESSION['result']);
			// $this->db->where('reciever',$proid);


			// 		// Run the query
			// $query = $this->db->get('friendlist');
			// 		// Let's check if there are any results
			// if($query->num_rows == 0){
			// 	$this->db->where('reciever', $_SESSION['result']);
			// 	$this->db->where('sender', $proid);


			// 		// Run the query
			// 	$query1 = $this->db->get('friendlist');
			// 		// echo $query1->num_rows;
				if($sizef == 0){
					echo "	<a href="; echo base_url('index.php/login/login/invite');echo "?id1=";echo $_SESSION['result']; echo "&id2="; echo $proid;echo "&fname="; echo $fname1; echo ">";
					echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connect</div></button>";
					echo "</a>";
				}
				else if($sizef>1)
				{
					echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connected</div></button>";
				}
				else
				{
					if($frnds[0]['send']==$proid)
					{
						echo "	<a href="; echo base_url('index.php/login/login/acceptinvite');echo "?id1=";echo $_SESSION['result']; echo "&id2="; echo $proid;echo "&fname="; echo $fname; echo ">";
						echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Accept</div></button>";
						echo "</a>";
					}
					else
					{
						echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Invitation Sent</div></button>";
					}
				}
					// $sql = "Select * FROM friendlist WHERE reciever = '"
					// .$_SESSION['result']."' AND sender='".$_SESSION['superusername']."'";
					// 	//echo $sql;
					// $res = mysql_query($sql);
					// 	//echo $res;
					// if /* or while */ ($row = mysql_fetch_assoc($res)){
						
					// 	$check = $row['status'];
					// 	if($check=="ok")
					// 	{
					// 		echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connected</div></button>";
					// 	}
					// 	else
					// 	{
					// 		echo "	<a href="; echo base_url('index.php/login/login/acceptinvite');echo "?id1=";echo $_SESSION['result']; echo "&id2="; echo $proid;echo "&fname="; echo $fname; echo ">";
					// 		echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Accept</div></button>";
					// 		echo "</a>";
					// 	}
					// }
				//}
			//}
			// else
			// {
			// 	$sql = "Select * FROM friendlist WHERE sender = '"
			// 	.$_SESSION['result']."' AND reciever='".$proid."'";
			// 			//echo $sql;
			// 	$res = mysql_query($sql);
			// 			//echo $res;
			// 	if /* or while */ ($row = mysql_fetch_assoc($res)){

			// 		$check = $row['status'];
			// 		if($check=="ok")
			// 		{
			// 			echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connected</div></button>";
			// 		}
			// 		else
			// 		{
			// 			echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Invitation Sent</div></button>";
			// 		}
			// 	}
			// }
			?>

		</div>
	</div>
</body>
</html>