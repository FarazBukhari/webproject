
<?php
class HELLO extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');


		public function fuc(){
		$email;
		$con=mysqli_connect("localhost","root","","baseapplication");
		if(mysqli_connect_errno())
		{
			echo "Failed to connect to mysql". mysqli_connect_error();
		}
		$result = mysqli_query($con,"SELECT * FROM sign");
		$r=$_POST[firstname];
		while($row = mysqli_fetch_array($result))
		{
			if (($row['email']==$_POST[email]))
			{
				echo "This email is already present";
				die();
				
			}
		}
		$sql="INSERT INTO sign 
		VALUES
		('$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[password]')";

		if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
		$this->load->view('country');

		mysqli_close($con);
	}
	}


?>