<html>
<head>
  <link href="<?php echo base_url('/assets/css/style1.css')?>" rel="stylesheet">
</head>
<body class="back">
  <div class="header">
    <div class="wil">
      <a href="<?php echo base_url('index.php/login/login/linkedin');?>" class="wil1">
        What is LinkedIn?
      </a>
    </div>
    <div class="jt">
      <a href="<?php echo base_url('index.php/login/login/join');?>" class="jt1">
        Join Today
      </a>
    </div>
    <div class="si">
      <a href="<?php echo base_url('index.php/login/login/signin');?>" class="si1">
        Sign In
      </a>
    </div>
    <div class="logo">
      <a href="<?php echo base_url('index.php/login/login/index');?>" class="logo1">
        <img src="<?php echo base_url('assets/img//logo.png');?>"></img>
      </a>
    </div>
  </div>
  <div class="h5-1">Sign in to LinkedIn</div>
</body>

<form action="<?php echo base_url('index.php/login/login/process');?>" method="POST" name="login" novalidate="novalidate" id="login" class="ajax-form" data-jsenabled="check">
  <div class="sub-div5">
    <div class="email"> Email Adress:  <input type="text" name = "username" id="username"></input></div>
    <div class="pass"> Password:  <input type="password" name = "password" id="password"></input>
      <text><a href="<?php echo base_url('index.php/login/login/password');?>">Forgot password?</a></text></div>
      <div class="endp5"><button type="submit" id="button2"></button>  or  <a href="<?php echo base_url('index.php/login/login/join');?>"; class="join1">Join LinkedIn</a></div>

    </form>


  </div>




  <div class="footer">

    <div id="f21">
      <img src="/Codeigniter-bootstrap--master/assets/img/foot.png"></img><a id="footid">&#169; 2013


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
      </div></a>
      


    </div>
    



  </div>








  </html>
