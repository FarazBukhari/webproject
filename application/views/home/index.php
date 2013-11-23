<html>
<head>
	<link href="<?php echo base_url('/assets/css/homepage.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
</head>
<body>
	<div class = "status">
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


		echo "<img src='$fulltarget' class = 'picture'>";
		?>
		<form action="<?php echo base_url('index.php/login/login/newsfeed');?>" method="post" novalidate="novalidate" id="login" class="ajax-form" data-jsenabled="check">
			<textarea name="postText" id="postText-postModuleForm" rows="2" cols="40" class="status-text" placeholder="Share an update..."></textarea>
			<div class = "privacy">
				<select class = "privacy1" name = "privacy" default >
					<option value="public">Public</option>
					<option value="private" selected>Connections</option>
				</select>
			</div>

			<div class = "share"><button class="btn-tertiary" type="submit" id="btn-submit">Share</button></div>
		</form>
	</div>
	<div class = "feed">
	<?php
		$user = $_SESSION['result'];
		

        $_SESSION['privacy'] = NULL;


        $sql = "Select * from newsfeed WHERE usersId = '" . $user . "' OR privacy = 'public' OR usersId IN (Select reciever FROM friendlist WHERE sender = '" . $user . "' AND status = 'ok') ORDER BY time DESC;";

        $res = mysql_query($sql);
        $query = $this->db->get('users');
        if($query->num_rows >= 1){
            while ($row = mysql_fetch_array($res)){
                $user = $row['usersId'];

                $sql1 = "Select * from users WHERE username = '" . $user . "'";
                $res1 = mysql_query($sql1);


                if($row1 = mysql_fetch_array($res1)){
				$thumb = $row1['Picture'];
				$fname = $row1['fname'];
				$lname = $row1['lname'];
				echo "<div class = 'newsfeed'>";
				echo "<div class = 'abcdef'>";
				echo "<img src='$thumb' class = 'picture'>";
				echo "<div class='abcd'>"; echo $fname; echo " "; echo $lname;
				echo "</div>";
				echo "<div class='abcde'>";
				echo $row['status'];
				echo "</div>";
				echo "</div>";
				

			
				?>
				<div class = "commentbox">
					<form action="<?php echo base_url('index.php/login/login/comment');echo "?username1=";echo $_SESSION['result']; echo "&cid="; echo $row['ID'];?>" method="post" novalidate="novalidate" id="login" class="ajax-form" data-jsenabled="check">
						<?php
						echo "<div class = 'comments'>";
						$this->db->where('id', $row['ID']);

						$tcomments = $this->db->get('comments');
						if($tcomments->num_rows > 0){
							foreach ($tcomments->result_array() as $row5){

								$this->db->where('username', $row5['userid']);
								$scomments = $this->db->get('users');
								foreach ($scomments->result_array() as $row6) {
									//echo $row6['username'] . " ";
									echo "<div class = 'com'>";
									echo "<img src='" . $row6['Picture'] . "' class = 'compic'>" . $row6['fname'] . " " . $row6['lname'] . "  " . $row5['comment'];
									echo "</div>";

								}
								
								// foreach ($scomments->result_array() as $row6){
									// echo "<div class = 'com'>";
									// echo "<img src='" . $row6['Picture'] . "' class = 'compic'>" . $sfname . " " . $slname . "  " . $row5['comment'];
									// echo "</div>";
								// }
								
							}
						}
						echo "<textarea name='postComment'  rows='2' cols='40' class='comment-text' placeholder='Write a comment...''></textarea>";
						echo "</div>";

						echo "<div class = 'comment-button'>";
						
						echo "<input class='btn-tertiary' type='submit' id='btn-submit' value='Comment'></input>";
						echo "</div></div>";
						?>
					</form>
				</div>
			<?php
				
               }
           }
       }

       else{
            echo "<h3><Center>There was an error</Center></h3>";
        }
     ?>
    </div>
</body>
</html>