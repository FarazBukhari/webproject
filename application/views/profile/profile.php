<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
</head>
<body>
	<div class = "profilecard">
		<?php
		$sql = "Select * FROM users WHERE username = '"
	.$_SESSION['hello']."'";
	$res = mysql_query($sql);
	if /* or while */ ($row = mysql_fetch_assoc($res)) {
		$fname = $row['fname'];
		$lname = $row['lname'];
		$fulltarget = $row['Picture'];
	}

	$sql1 = "Select * FROM users WHERE username = '"
	.$_SESSION['superusername']."'";
	$res1 = mysql_query($sql1);
	if /* or while */ ($row1 = mysql_fetch_assoc($res1)) {
		$fname1 = $row1['fname'];
		$lname1 = $row1['lname'];
		$fulltarget1 = $row1['Picture'];
	}
		?>

		<div class = "Profilename1">
			<?php echo $fname1;?> <?php echo $lname1;?> 
		</div>

		<div class = "pp">
			<?php echo "<img src='$fulltarget1' class = 'pp'>";?>
		</div>

		<div class = "dpchange">
			<!-- <a href = "<?php echo base_url('/index.php/login/login/addfriend')?>?id1=<?php echo $_SESSION['hello']; ?>&id2=<?php echo $_SESSION['superusername'];?>&fname=<?php echo $fname1; ?>"> -->
			<?php
			$this->db->where('sender', $_SESSION['hello']);
			$this->db->where('reciever', $_SESSION['superusername']);


					// Run the query
			$query = $this->db->get('friendlist');
					// Let's check if there are any results
			if($query->num_rows == 0){
				$this->db->where('reciever', $_SESSION['hello']);
				$this->db->where('sender', $_SESSION['superusername']);


					// Run the query
				$query1 = $this->db->get('friendlist');
					// echo $query1->num_rows;
				if($query1->num_rows == 0){
					echo "	<a href="; echo base_url('index.php/login/login/invite');echo "?id1=";echo $_SESSION['hello']; echo "&id2="; echo $_SESSION['superusername'];echo "&fname="; echo $fname1; echo ">";
					echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connect</div></button>";
					echo "</a>";
				}
				else
				{
					$sql = "Select * FROM friendlist WHERE reciever = '"
					.$_SESSION['hello']."' AND sender='".$_SESSION['superusername']."'";
						//echo $sql;
					$res = mysql_query($sql);
						//echo $res;
					if /* or while */ ($row = mysql_fetch_assoc($res)){
						
						$check = $row['status'];
						if($check=="ok")
						{
							echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connected</div></button>";
						}
						else
						{
							echo "	<a href="; echo base_url('index.php/login/login/acceptinvite');echo "?id1=";echo $_SESSION['hello']; echo "&id2="; echo $_SESSION['superusername'];echo "&fname="; echo $fname; echo ">";
							echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Accept</div></button>";
							echo "</a>";
						}
					}
				}
			}
			else
			{
				$sql = "Select * FROM friendlist WHERE sender = '"
				.$_SESSION['hello']."' AND reciever='".$_SESSION['superusername']."'";
						//echo $sql;
				$res = mysql_query($sql);
						//echo $res;
				if /* or while */ ($row = mysql_fetch_assoc($res)){

					$check = $row['status'];
					if($check=="ok")
					{
						echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connected</div></button>";
					}
					else
					{
						echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Invitation Sent</div></button>";
					}
				}
			}
			?>

		</div>
	</div>
</body>
</html>