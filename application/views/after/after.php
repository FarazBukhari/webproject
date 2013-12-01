<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
</head>
<body>
	<div class = "profilecard">
		<?php   
		session_start();
		$sql = "Select * FROM users WHERE username = '"
		.$_SESSION['result']."'";
		$res = mysql_query($sql);

		if /* or while */ ($row = mysql_fetch_assoc($res)) {
			$fname = $row['fname'];
			$lname = $row['lname'];
			$fulltarget = $row['Picture'];
		}
		?>
		<div class = "Profilename1">
			<?php echo $fname;?> <?php echo $lname;?> 
		</div>

		<div class = "pp">
			<?php
			if(isset($_SESSION['prevpic'])){
				if($_SESSION['prevpic']){
					$path = $_SESSION['prevpic'];
					unlink($path);

					unset($_SESSION['prevpic']);
				}
			}
			else{
				echo "";
			}
			echo "<img src='$fulltarget' class = 'pp'>";?>
		</div>

<!-- 			<div class = "Profilename2">
			    <?php echo $lname;?>
			</div> -->
			

			<div class = "dpchange">
				<a href = "<?php echo base_url('/index.php/login/login/imageupload')?>"><button class="btn-tertiary" type="submit" id="btn-submit"><div>Change profile picture</div></button></a>
			</div>
		</div>
	</body>
	</html>