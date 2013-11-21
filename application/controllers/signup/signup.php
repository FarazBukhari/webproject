<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function check()
	{
		//redirect('login/login/country','refresh');}
			
		$this->load->model('register');
		$result=$this->register->registration();
		if($result==true){
			redirect('login/login/country','refresh');}
			else
			redirect('login/login/linkedin','refresh');

	}
	
}


?>