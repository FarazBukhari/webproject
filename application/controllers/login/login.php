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
	$data['heading'] = "Search Results";
	$this->load->view('common/header',$data);
	$this->load->view('common/login-header',$data);
	$this->load->view('search/search', $data);
}

public function profile()
{

	$_SESSION['superusername'] = $_GET['username'];
	$_SESSION['hello']= $_GET['myid'];
	$data['heading'] = $_GET["fname"];
	$this->load->view('common/header',$data);
	$this->load->view('common/login-header',$data);
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

public function signup()
{
	session_start();
	$this->load->model('register');
	$result=$this->register->registration();
	if(! $result){
		redirect('login/login/registered','refresh');
	}else{
// If user did validate, 
// Send them to members area
		$_SESSION['result'] = $result;
		redirect('login/login/imageupload','refresh');
	}

}

public function addfriend(){
	$this->load->model('login_model');
// Validate the user can login
	$result = $this->login_model->addf();
	if($result){
		header('Location: profile?myid='.$_GET['id1'].'&username='.$_GET['id2'].'&fname='.$_GET['fname']);
	}
	else{
		echo "Could not add friend";
	}

}

public function imgupload(){
	$this->load->model('login_model');
	$r = $this->login_model->imgup();

}
public function acceptinvite(){
	$this->load->model('login_model');
// Validate the user can login
	$result = $this->login_model->acceptinvite();
	if($result){
		header('Location: profile?myid='.$_GET['id1'].'&username='.$_GET['id2'].'&fname='.$_GET['fname']);
	}
	else{
		echo "Could not add friend";
	}


}

public function newsfeed(){
	session_start();
	$_SESSION['status'] = $_POST['postText'];
	$_SESSION['privacy'] = $_POST['privacy'];
	$this->load->model('login_model');
	$result = $this->login_model->newsfeed();

	if($result){
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