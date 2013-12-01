<?php
// class Upload extends CI_Controller{

// 	function __construct()
// 	{
// 		parent::__construct();
// 		$this->load->helper(array('form', 'url'));
// 	}

// 	function index()
// 	{
// 		$this->load->view('image', array('error' => ' ' ));
// 	}

// 	function do_upload()
// 	{
session_start();

//Delete previous picture
	if($_SESSION['result']){
		$sql = "Select username, Picture FROM users WHERE username  LIKE '%" . $_SESSION['result'] . "%'";
		$res = mysql_query($sql);
		if($res){
			$row = mysql_fetch_assoc($res);
			$prevpic = $row['Picture'];

			$path = $_SERVER['DOCUMENT_ROOT']."/Codeigniter-bootstrap--master/".$prevpic;
			if($path){
				$_SESSION['prevpic'] = $path;	
			}
		
		//unlink($path);
		}
	}
	//$submit=;
if(isset($_POST['sub']))
{


	$name=$_FILES['img']['name'];
	$type=$_FILES['img']['type'];

	$size=($_FILES['img']['size'])/1024;

	$temp=explode('.',$name);
	$ext=end($temp);
	if (($ext == "gif")
		|| ($ext == "jpeg")
		|| ($ext == "jpg")
		|| ($ext =="png")
		&& ($size > 30))
	{

	##############################File Renaming ###################################################


		$newname=uniqid();
	//$ext=end(explode('.',$name));
		$fullname=$newname.".".$ext;
		$target="upload/images/";
		$fulltarget=$target.$fullname;

		$result = $_SESSION['result'];
	//$data['fulltarget'] = $fulltarget;
	//$this->load->view('image', $data);

		if(move_uploaded_file($_FILES['img']['tmp_name'], $fulltarget)) {

			echo "The file ".  basename( $_FILES['img']['name']). 
			" has been uploaded";
		}

		else{
			echo "There was an error uploading the file, please try again!";
		}
		echo $fulltarget;
		$_SESSION['target'] = $fulltarget;
	// echo $result;
		$hi=$_FILES['img']['name'];
	//insert into pic
	//from sign
	//value($_FILES['img']['nam
		$con=mysqli_connect("localhost","root","","webproj");
		if(mysqli_connect_errno())
		{
			echo "Failed to connect to mysql". mysqli_connect_error();
		}

		//$sql="update users set Picture= '$fulltarget' where username='$result'";
		$this->db->where('username', $result);
		$this->db->set('Picture', $fulltarget);
		$this->db->update('users');


		if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}


		mysqli_close($con);

	// if(move_uploaded_file($_FILES['img']['tmp_name'],$fulltarget))
	// {
	//     $_SESSION['target'] = $fulltarget;
	// 	//$result = $this->register->register_user_details_image($path);
		header("Location: http://localhost:8080/Codeigniter-bootstrap--master/index.php/login/login/after");

	// }
	// else
	// {
	//     echo "Failed";
	// }
	// ##############################File Renaming end ###################################################
	// }

	// else{
	//     echo "not successful";
	}
}
?>