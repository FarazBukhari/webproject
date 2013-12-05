<html>
<head>
    <link href="<?php echo base_url('/assets/css/login-header1.css')?>" rel="stylesheet">
</head>
<body>
    <div class = "profilecard">

        <?php   
        session_start();
        $sresult = $_SESSION['srch'];
        $size=sizeof($sresult);
        if($size>0){
            $i=0;
            while($size>0)
            {
                $fname = $sresult[$i]['fname'];
                $lname = $sresult[$i]['lname'];
                $fulltarget = $sresult[$i]['Picture'];
                $username = $sresult[$i]['username'];
                echo "<div class = 'Profilename1'>";
                echo "<img src='$fulltarget' class = 'pp'>";
                echo "  <a href="; echo base_url('index.php/login/login/profile');echo "?username=";echo $username; echo "&fname="; echo $fname;echo "&myid="; echo $_SESSION['result']; echo ">"; echo $fname; echo " "; echo $lname;
                echo "</div></a>";
                $i++;
                $size--;
            }
        }
        else
        {
            echo "<h3><Center>The User Does Not Exist</Center></h3>";
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
