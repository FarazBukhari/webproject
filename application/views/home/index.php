<html>
<head>
	<link href="<?php echo base_url('/assets/css/homepage.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/js/jquery-1.10.2.js')?>" rel="javascript" type="text/javascript">
	<script src="<?php echo base_url('/assets/js/jquery.embedly-3.1.1.min.js')?>" ></script>
	<!--<script src="http://cdn.embed.ly/jquery.embedly-3.1.1.min.js" type="text/javascript"></script>-->
	
</head>
<body >
	<div class = "status">

		<?php   
		session_start();
		// $sql = "Select * FROM users WHERE username = '"
		// .$_SESSION['result']."'";
		// $res = mysql_query($sql);
		// if /* or while */ ($row = mysql_fetch_assoc($res)) {
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		$fulltarget = $_SESSION['target'];
		//}
		echo "<img src='$fulltarget' class = 'picture'>";
		?>
		<!--<form action="" method="post" novalidate="novalidate" id="login" class="ajax-form" data-jsenabled="check">-->
		<textarea name="postText" id="postText-postModuleForm" rows="2" cols="40" class="status-text" placeholder="Share an update..."></textarea>
		<div class = "privacy" >
			<select class = "privacy1" name = "privacy"  id = "privacy"default >
				<option value="public">Public</option>
				<option value="private" selected>Connections</option>
			</select>
		</div>
		<div class = "share"><button class="btn-tertiary" type="submit" id="btn-submit">Share</button></div>
		
	</div>
	<div class = "feed" id = "feed">
		<?php
		$res1234 = $_SESSION['statuses'];
		$size = sizeof($res1234);
		$i=0;
		while ($size>0){
			$thumb = $res1234[$i]['Picture'];
			echo "<div class = 'newsfeed'>";
			echo "<div class = 'abcdef'>";
			echo "<img src='$thumb' class = 'picture'>";
			echo "<div class='abcd'>"; echo $res1234[$i]['fname']; echo " "; echo $res1234[$i]['lname'];
			echo "</div>";
			echo "<div class='abcde'>";
			if($res1234[$i]['type']=="text"){
				echo $res1234[$i]['status'];
			}
			else if($res1234[$i]['type']=="url")
			{
				echo "<a href=";echo $res1234[$i]['status']; echo " class='b'>";echo $res1234[$i]['status']; echo "</a>";
			}
			echo "</div>";
			echo "</div>";
			$size--;			
			?>
			<div class = "commentbox">
				<form action="<?php echo base_url('index.php/login/login/comment');echo "?username1=";echo $_SESSION['result']; echo "&cid="; echo $res1234[$i]['ID'];;?>" method="post" novalidate="novalidate" id="login" class="ajax-form" data-jsenabled="check">
					<?php
					echo "<div class = 'comments'>";
					$comm=$_SESSION['comment'];
					$sizec=sizeof($comm);
					$p=0;
					while($sizec>0)
					{
						if($comm[$p]['id']==$res1234[$i]['ID'])
						{
							$thumb1=$comm[$p]['Picture'];
							echo "<div class = 'com'>";
							echo "<img src='" . $thumb1 . "' class = 'compic'>" . $comm[$p]['fname'] . " " . $comm[$p]['lname'] . "  " . $comm[$p]['comment'];
							echo "</div>";
						}
						$sizec--;
						$p++;
					}
					$i++;
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
		?>
	</div>

	<script>
	$(function(){
		$('#btn-submit').click(function(){
			get_ax();
		});
	})

	function get_ax(){
		

		var base = "<?php echo base_url()?>index.php/login/";
           // var image = $('#image').val();
           var postText = $('#postText-postModuleForm').val();
           var type1;
           if(validateUrl(postText))
           {
           	type1='url';
           }
           else
           {
           	type1='text';
           }
           var privacy = $('#privacy').val();
           // var link= $('#link-input').val();
           $.ajax({
           	type: "POST",
           	url: base + "login/newsfeed",
           	data: {postText : postText, privacy : privacy, type1 : type1},
           	success: function(blu){
           		
           		

                     // document.getElementById('img-src').src = null;
                     $('#feed').replaceWith(blu);
                     // $.embedly.defaults.key = '202cefe06a3b4346af0b1620d84a8ac9';
                     // $('a').embedly();
                     $('#postText-postModuleForm').val("");
                     

                 }
             });
       }

       // $(function(){
       // 	$.embedly.defaults.key = '202cefe06a3b4346af0b1620d84a8ac9';
       // 	$('a').embedly();
       // });
       
       function validateUrl(url) { 
       	var pattern = "(http://)?(([0-9a-z_!'().&=$%-]: )?[0-9a-z_!'().&=$%-]@)?(([0-9]{1,3}\.){3}[0-9]{1,3}|([0-9a-z_!'()-]\.)([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.[a-z]{2,6})(:[0-9]{1,4})?((/?)|(/[0-9a-z_!*'().;?:@&=$,%#-])/?)$";
       	if(url.match(pattern)) { 
       		return true; } 
       		else { 
       			return false; 
       		} 
       	}

       	</script>
       </body>
       </html>