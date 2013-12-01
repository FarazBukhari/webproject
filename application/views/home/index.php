<html>
<head>
	<link href="<?php echo base_url('/assets/css/homepage.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/newfeed1.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/newsfeed2.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/newsfeed3.css')?>" rel="stylesheet">
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
	<div class = "bigdiv">
		<?php
		$user = $_SESSION['result'];
		
        
        $_SESSION['privacy'] = NULL;


		$sql = "Select * from newsfeed WHERE usersId = '" . $user . "' OR privacy = '" . $_SESSION['privacy'] . "' OR usersId IN (Select reciever FROM friendlist WHERE sender = '" . $user . "' AND status = 'ok')";
		
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
   			    	echo "<img src='$thumb' class = 'picture'>";
   			    	echo "<div class='abcd'>"; echo $fname; echo " "; echo $lname;
   			    	echo "</div>";
   			    	echo "<div class='abcde'>";
   			    	echo $row['status'];
   			    	echo "</div>";
   			    	echo "</div>";
					}
				}

		
			}
		else{
			echo "<h3><Center>There was an error</Center></h3>";
		}
		?>
	</div>


<div class="footer">
    <div class="f1">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="hc">Help Center</a>
    </div>
    <div class="f2">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">About</a>
    </div>
    <div class="f3">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Press</a>
    </div>
    <div class="f4">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Blog</a>
    </div>
    <div class="f5">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Careers</a>
    </div>
    <div class="f6">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Advertising</a>
    </div>
    <div class="f7">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Talent Solutions</a>
    </div>
    <div class="f8">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Tools</a>
    </div>
    <div class="f9">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Mobile</a>
    </div>
    <div class="f10">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Developers</a>
    </div>
    <div class="f11">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Publishers</a>
    </div>
    <div class="f12">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">Language</a>
    </div>
    <div class="f13">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl">SlideShare</a>
    </div>
    <div class="f14">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">LinkedIn Updates</a>
    </div>
    <div class="f15">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">LinkedIn Influencers</a>
    </div>
    <div class="f16">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">LinkedIn Jobs</a>
    </div>
    <div class="f17">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Jobs Directory</a>
    </div>
    <div class="f18">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Company Directory</a>
    </div>
    <div class="f19">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Groups Directory</a>
    </div>
    <div class="f20">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Title Directory</a>
    </div>
    <div class="f21">
        <img src= "/Codeigniter-bootstrap--master/assets/img/foot.png">&#169; 2013
    </div>
    <div class="f22">
    <a href="<?php echo base_url('index.php/login/login/agreement');?>" class="fl1">User Agreement</a>
    </div>
    <div class="f23">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Privacy Policy</a>
    </div>
    <div class="f24">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Community Guidelines</a>
    </div>
    <div class="f25">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Cookie Policy</a>
    </div>
    <div class="f26">
    <a href="<?php echo base_url('index.php/login/login/index');?>" class="fl1">Copyright Policy</a>
    </div>
  </div>
</body>
</html>