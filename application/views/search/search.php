<html>
<head>
	<link href="<?php echo base_url('/assets/css/login-header1.css')?>" rel="stylesheet">
</head>
	<body>
		<div class = "profilecard">
			
			<?php   
				session_start();
				$name = $_SESSION['fname'];
				//echo $_SESSION['result'];
				if(preg_match('/\s/',$name) == 1){
					$words = explode(" ", $name);

					$sql = "Select fname, lname, Picture, username FROM users WHERE fname LIKE '%" . $words[0] . "%' AND lname LIKE '%" . $words[1] ."%'";
	 				
	 				$res = mysql_query($sql);
	 				$this->db->where('fname', $words[0]);
					$this->db->where('lname', $words[1]);
		

					// Run the query
					$query = $this->db->get('users');
					// Let's check if there are any results
					if($query->num_rows >= 1){
 						while ($row = mysql_fetch_array($res)) {
	 				    	$fname = $row['fname'];
	 				    	$lname = $row['lname'];
	 				    	$fulltarget = $row['Picture'];
	 				    	$username = $row['username'];
	 				    	echo "<div class = 'Profilename1'>";
   			    			echo "<img src='$fulltarget' class = 'pp'>";
                            //echo $username; echo $_SESSION['result'];
 							echo "	<a href="; echo base_url('index.php/login/login/profile');echo "?username=";echo $username; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo $fname; echo " "; echo $lname;
        
                            // echo "  <a href="; echo base_url('index.php/login/login/invite');echo "?id1=";echo $_SESSION['result']; echo "&id2="; echo $username;echo "&fname="; echo $fname; echo ">";
                            // echo "<button class='btn-tertiary' type='submit' id='btn-submit'><div>Connect</div></button>";echo "</a>";
 							// echo "</div>";
 							// echo "<div class = 'pp'>";

							echo "</div></a>";
						}
					}
					else{
						//echo "<div class = 'Profilename1'>";
						echo "<h3><Center>The User Does Not Exist</Center></h3>";
						//echo "</div>";
					}
	 					
				
				}
				
				else if(preg_match('/\s/',$name) == 0){
			
					$sql = "Select fname, lname, Picture, username FROM users WHERE fname LIKE '%" . $name . "%' OR lname LIKE '%" . $name ."%'";
	 				
	 				$res = mysql_query($sql);
	 				$this->db->where('fname', $name);
					//$this->db->where('lname', $name);
		
					// Run the query
					$query = $this->db->get('users');

                    $this->db->where('lname', $name);
                    $query1 = $this->db->get('users');
					if($query->num_rows >= 1||$query1->num_rows >= 1){
	 				/*if */ while ($row = mysql_fetch_array($res)) {
	 				    $fname = $row['fname'];

	 				    $lname = $row['lname'];
	 				    
	 				    $fulltarget = $row['Picture'];
	 				    $username = $row['username'];
	 				    echo "<div class = 'Profilename1'>";
   			    		echo "<img src='$fulltarget' class = 'pp'>";
 						echo "	<a href="; echo base_url('index.php/login/login/profile');echo "?username=";echo $username; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo $fname; echo " "; echo $lname;
 						// echo "</div>";
 						// echo "<div class = 'pp'>";

						echo "</div></a>";

 					}
 				}

 					else{
						//echo "<div class = 'Profilename1'>";
						echo "<h3><Center>The User Does Not Exist</Center></h3>";
						//echo "</div>";
					}
 				}
 				
 			?>
<!--  			<div class = "Profilename1">
 				<!-- <a href="page2.php?varname=<?php echo $var_value ?>">Page2</a>
 			    <a href="<?php echo base_url('index.php/login/login/profile');?>?username=<?php echo $username ?>"><?php echo $fname;?> <?php echo $lname;?>
 			</div>

 			<div class = "pp">
 			    <?php echo "<img src='$fulltarget' class = 'pp'>";?>
			</div></a>
		 -->
		 
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
