<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()//home page
	{

		$data['heading'] = "Login";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('home/home', $data);
		$this->load->view('common/footer',$data);
	}

	public function index1($data=null)//home page after login
	{

		$data['heading'] = "Home";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('home/index', $data);
		//$this->load->view('common/footer',$data);
	}

	public function linkedin()
	{
		$data['heading'] = "Login";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('linkedin/linkedin', $data);
		$this->load->view('common/footer',$data);	
	}
	public function join()
	{
		$data['heading'] = "Login";
		$this->load->view('Join/join', $data);	
	}
	public function country()
	{
		$data['heading'] = "Countries";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('Country/country', $data);
		$this->load->view('common/footer',$data);
	}
	public function signin()
	{
		$data['heading'] = "SignIn";
		$this->load->view('Signin/signin', $data);
	}

	public function signinerror()
	{
		$data['heading'] = "SignIn";
		$this->load->view('Signin/signinerror', $data);
	}

	public function after()
	{
		$data['heading'] = "After";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('After/after', $data);
		$this->load->view('common/footer',$data);
	}

	public function login()
	{
		$data['heading'] = "LogIn";
		$this->load->view('Login/login', $data);
	}

	public function password()
	{
		$data['heading'] = "Forget password";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('Password/password', $data);
	}
	public function agreement()
	{
		$data['heading'] = "Countries";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('Agreement/agreement', $data);	
	}
	public function imageupload()
	{
		$this->load->model('register');
		$image=$this->register->register_user_details_image();
		$data['heading'] = "Image Upload";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('image', $data);
		$this->load->view('common/footer',$data);
	}

	public function registered()
	{
		$data['heading'] = "Already registered?";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('Join/alreadyregistered', $data);
	}

	public function search()
	{
		//$this->load->model('search_model');
		//$result = $this->search_model->search();
		$data['heading'] = "Search Results";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('search/search', $data);
		//$this->load->view('common/footer',$data);
	}

	public function profile()
	{
		
		$_SESSION['superusername'] = $_GET['username'];
		$_SESSION['hello']= $_GET['myid'];
		//echo $_SESSION['superusername'];
		$data['heading'] = $_GET["fname"];
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		//echo $_GET["username"];
		if($_SESSION['superusername'] == $_SESSION['hello']){
			$this->load->view('After/after', $data);
		}
		else{
			$this->load->view('Profile/profile', $data);
		}
	}

	public function notification()
	{
		session_start();
		//$_SESSION['hello']= $_GET['myid'];
		$data['heading'] = "Notifications";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('Notification/notification', $data);
		$this->load->view('common/footer',$data);
		
	}

	public function requests(){
		session_start();
		$data['heading'] = "Friend Requests";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('Notification/requests', $data);
		$this->load->view('common/footer',$data);
	}

	public function search1()
	{
		$this->load->model('register');
		$fname=$this->register->registration1();
		session_start();
		$_SESSION['fname']=$fname;
		redirect('login/login/search','refresh');
	}

	public function invite(){
		session_start();
		$data['heading'] = "Invite to Connect";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('Addfriend/invite1', $data);

	}
/*	public function index($msg = NULL){
		// Load our view to be displayed
		// to the user
		$this->load->helper('url');

		if($this->session->userdata('username')){
			redirect('common/settings', 'refresh');
		}else{
			$data['msg'] = $msg;
			$data['heading'] = "Login";
			$this->load->view('common/header',$data);
			$this->load->view('loginView/login_view', $data);
		}
		//$this->load->view('common/footer',$data);
	}
	*/
	public function signup()
	{
		session_start();
		$this->load->model('register');
		$result=$this->register->registration();
		if(! $result){
			redirect('login/login/registered','refresh');
			// If usleep(micro_seconds)er did not validate, then show them login page again
			//$msg = '<font color=red>Invalid username and/or password.</font><br />';
			//$this->index($msg);
		}else{
			// If user did validate, 
			// Send them to members area
			$_SESSION['result'] = $result;
			redirect('login/login/imageupload','refresh');
			//echo $result;
//			redirect('common/settings','refresh');
		}

	}

	public function addfriend(){
		// echo $_GET['id1'];
		// echo $_GET['id2'];

		$this->load->model('login_model');
		// Validate the user can login
		$result = $this->login_model->addf();
		if($result){
			//header( 'Location: shore_establishment.php?ship_id=' .urlencode($_GET['ship_id']) . "?shore=1");
			header('Location: profile?myid='.$_GET['id1'].'&username='.$_GET['id2'].'&fname='.$_GET['fname']);
		}
		else{
			echo "Could not add friend";
		}
		
	}

	public function acceptinvite(){
		// echo $_GET['id1'];
		// echo $_GET['id2'];

		$this->load->model('login_model');
		// Validate the user can login
		$result = $this->login_model->acceptinvite();
		if($result){
			//header( 'Location: shore_establishment.php?ship_id=' .urlencode($_GET['ship_id']) . "?shore=1");
			header('Location: profile?myid='.$_GET['id1'].'&username='.$_GET['id2'].'&fname='.$_GET['fname']);
		}
		else{
			echo "Could not add friend";
		}
		

	}
	// public function newsfeed(){
	// 	session_start();
	// 	$this->load->model('login_model');
	// 	$result = $this->login_model->getNewsFeed();
		
		// echo $result;
		// if($result){
		// 	foreach($result as $r){
		// 		$r->imageurl=$this->login_model->getImage($result->usersId);
		// 	}



		// 	$data['data']=$result;
		// 	$this->index1($data);

		// }
		// else{
		// 	echo "Could not post status";
		// }
	//}


	public function newsfeed(){
		session_start();
		$_SESSION['status'] = $_POST['postText'];
		$_SESSION['privacy'] = $_POST['privacy'];
		$this->load->model('login_model');
		$result = $this->login_model->newsfeed();
		
		if($result){
			//redirect('login/login/newsfeed', 'refresh');
			$this->load->model('login_model');
			$res1 = $this->login_model->getNewsFeed();
			redirect('login/login/index1','refresh');
		}
		else{
			echo "Could not post status";
		}
	}

	public function process(){
		session_start();
		// Load the model
		$this->load->model('login_model');
		// Validate the user can login
		$result = $this->login_model->validate();
		// Now we verify the result
		if(! $result){
			redirect('login/login/signinerror','refresh');
			// If usleep(micro_seconds)er did not validate, then show them login page again
			//$msg = '<font color=red>Invalid username and/or password.</font><br />';
			//$this->index($msg);
		}else{
			// If user did validate, 
			// Send them to members area

			$_SESSION['result'] = $result;
			redirect('login/login/index1','refresh');
//			redirect('common/settings','refresh');
		}		
	}

	function do_upload()
	{
		session_start();
		$submit=$_POST['sub'];
		if(isset($submit))
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

	//$data['fulltarget'] = $fulltarget;
	//$this->load->view('image', $data);

				if(move_uploaded_file($_FILES['img']['tmp_name'],$fulltarget))
				{
					$_SESSION['target'] = $fulltarget;
		//$result = $this->register->register_user_details_image($path);
					header("Location: http://localhost:8080/Codeigniter-bootstrap--master/index.php/login/login/imageupload");

				}
				else
				{
					echo "Failed";
				}
	##############################File Renaming end ###################################################
			}

			else{
				echo "not successful";
			}
		}
	}

	public function do_logout(){
		$this->session->sess_destroy();
		redirect('login/login','refresh');
	}


	public function storedproc()
	{
		$data['heading'] = "Stored Procedure";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('storedproc/phpmysqlstoredprocedure1', $data);
		$this->load->view('common/footer',$data);
	}
}



?>