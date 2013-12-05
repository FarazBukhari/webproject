<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()//home page
	{

		$data['heading'] = "World's Largest Professional Network | LinkedIn";
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
		$data['heading'] = "LinkedIn";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('linkedin/linkedin', $data);
		$this->load->view('common/footer',$data);	
	}
	public function join()
	{
		$data['heading'] = "Join LinkedIn";
		$this->load->view('join/join', $data);	
	}
	public function country()
	{
		$data['heading'] = "Countries";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('country/country', $data);
		$this->load->view('common/footer',$data);
	}
	public function signin()
	{
		$data['heading'] = "SignIn";
		$this->load->view('signin/signin', $data);
	}

	public function signinerror()
	{
		$data['heading'] = "SignIn";
		$this->load->view('signin/signinerror', $data);
	}

	public function after()
	{
		$data['heading'] = "After";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('after/after', $data);
		$this->load->view('common/footer',$data);
	}

	public function login()
	{
		$data['heading'] = "LogIn";
		$this->load->view('login/login', $data);
	}

	public function password()
	{
		$data['heading'] = "Forget password";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('password/password', $data);
	}
	public function agreement()
	{
		$data['heading'] = "Countries";
		$this->load->view('common/header',$data);
		$this->load->view('common/header1',$data);
		$this->load->view('agreement/agreement', $data);	
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
		$this->load->view('join/alreadyregistered', $data);
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
			$this->load->view('after/after', $data);
		}
		else{
			$this->load->model('login_model');
			$res1 = $this->login_model->getdata();
			$this->load->view('profile/profile', $data);
		}
	}

	public function notification()
	{
		session_start();
		$data['heading'] = "Notifications";
		$this->load->model('login_model');
		$res1 = $this->login_model->notify();
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('notification/notification', $data);
		$this->load->view('common/footer',$data);

	}

	public function requests(){
		session_start();
		$data['heading'] = "Friend Requests";
		$this->load->model('login_model');
		$res1 = $this->login_model->displayreq();
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('notification/requests', $data);
		$this->load->view('common/footer',$data);
	}

	public function search1()
	{
		session_start();
		$this->load->model('register');
		$fname=$this->register->registration1();
		
		//$_SESSION['fname']=$fname;
		redirect('login/login/search','refresh');
	}

	public function invite(){
		session_start();
		$data['heading'] = "Invite to Connect";
		$this->load->view('common/header',$data);
		$this->load->view('common/login-header',$data);
		$this->load->view('addfriend/invite1', $data);

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
			$this->load->model('login_model');
			$res1 = $this->login_model->getNewsFeed1();
			$this->load->model('login_model');
			$result = $this->login_model->comment1();
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
		$this->load->model('login_model');
		$res1 = $this->login_model->getNewsFeed1();
		$this->load->model('login_model');
		$result = $this->login_model->comment1();

	}

		public function imgupload1(){
		$this->load->model('login_model');
		$r = $this->login_model->imgup1();
		echo $r;

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
		$_SESSION['type']=$_POST['type1'];
		$this->load->model('login_model');
		$result = $this->login_model->newsfeed();

		if($result){
			$this->load->model('login_model');
			$res1 = $this->login_model->getNewsFeed1();
			$this->load->view('home/feed-update');
		}
		else{
			echo "<Center><p>Could not post status</p></Center>";
		}
	}

	public function comment(){
		session_start();
		
		$_SESSION['b']=$_GET['username1'];
		$_SESSION['a']=$_GET['cid'];
		$this->load->model('login_model');
		$result = $this->login_model->comment();
		if($result){
			$this->load->model('login_model');
			$result = $this->login_model->comment1();
			redirect('login/login/index1');
		}
		else{
			echo "Could not post comment";
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
			$this->load->model('login_model');
			$res1 = $this->login_model->getNewsFeed1();
			$this->load->model('login_model');
			$result = $this->login_model->comment1();
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