<link href="<?php echo base_url('/assets/css/login-header.css')?>" rel="stylesheet">

<div class="header" role="banner">
	<div class="wil">
		<a href="<?php echo base_url('index.php/login/login/notification');?>" class="wil1">
			<div class = "notification"></div>
		</a>
	</div>
	<div class="jt">
		<a href="<?php echo base_url('index.php/login/login/after');?>" class="jt1">
		</a>
	</div>
	<div class="si">
		<a href="<?php echo base_url('index.php/login/login/after');?>" class="si1">
		</a>
	</div>
	<form method="post" action="<?php echo base_url('index.php/login/login/search1');?>" id="searchform">
		<div class = "search">
			<input type = "text" class = "searchbar" name="name">
		</div>



		<div class = "srchbtn">
			
			<button class="searchbtn" type="submit"><img src="<?php echo base_url('/assets/img/search.png')?>"></button><a class = "advsrch">Advanced</a>
			
		</div>
	</form>


	<div class="logo">
		<a href="<?php echo base_url('index.php/login/login/after');?>" class="logo1">
			<img src="<?php echo base_url('/assets/img/logo.png')?>">
		</a>
	</div>

	<div class = "logout">
		<a href = "logout.php" class = "logout">Logout</a>
	</div>

</div>

<div class = "menubar">
	<div class = "wrapper">
		<ul id="menu">
			<li><a href="<?php echo base_url('index.php/login/login/index1')?>">Home</a></li>
			<li><a href="<?php echo base_url('index.php/login/login/after')?>">Profile</a></li>
			<li><a href="<?php echo base_url('index.php/login/login/index1')?>">Network</a></li>
			<li><a href="<?php echo base_url('index.php/login/login/index1')?>">Jobs</a></li>
			<li><a href="<?php echo base_url('index.php/login/login/index1')?>">Interest</a></li>
			
		</ul>
	</div>
</div>
