<link href="<?php echo base_url('/assets/css/homepage.css')?>" rel="stylesheet">
<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">
<link href="<?php echo base_url('/assets/js/jquery-1.10.2.js')?>" rel="javascript" type="text/javascript">

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

