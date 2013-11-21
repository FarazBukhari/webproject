<link href="<?php echo base_url('/assets/css/style2.css')?>" rel="stylesheet">
<!-- <div class = "imageupload">
	<form action="upload_file.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	<div id="a2">
		<?php echo "<img src=$fulltarget>";?>
	</div> -->




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style2.css')?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Image</title>

<script type="text/javascript">
    var path = "<?php echo $fulltarget; ?>";
    alert("path");
</script>
</head>

<body>
    <div id="a1">
        <form action="upload_file.php" name="frm" method="post" enctype="multipart/form-data">


        <!-- <input type="file" name="img" /><br />

        <input type="submit" name="sub" value="Submit" />
        </form>
        </div>
        <div id="a2">
        <?php echo "<img src='$fulltarget'>";?>
        </div> -->
            <div id="a111">
            	<label for="blogpic">Select a profile picture:</label>
                    <input type="file" size="23" id="blogpic" name="img" onChange="javascript:previewImage(this.value)"/>
                    <div id="preview-image">
                    	<div id="imagethumb"></div>
                        <div id="loading" style="visibility:hidden"><img src="/images/loading.gif" alt="loading" title="loading" /></div>
                        <div id="supportedfiles"><p class="nomargin">Supported file types: jpg, jpeg, png (max 1mb) <br/>Your image will be resized to 110 by 110 px (40 by 40 for blog thumbs)</p></div>

                        <input class = "btn-tertiary" type="submit" name="sub" value="Submit" onclick="myfunction()" />

                        <!--<script type="text/javascript">
                                funtion myfunction(){
                                var path = "<?php echo $fulltarget; ?>";
                                alert("path");
                                document.getElementById("image").innerHTML ='<img src="path" title="Loading..." alt="Loading...">';
                            }
                        </script> -->
                        
                        <td width=180 height= 200 >
                            <div class="classname">
                                    <!-- <h1>
                                        <?php
                                            $fulltarget = $_SESSION['target'];
                                            echo "<img src='$fulltarget' width = '200px'>";
                                        
                                            
                                        ?>


                                    </h1> -->
                                
                            </div>
                        </td>
                    </div>
                </div>
            </form>
        </div>
	</body>
</html>