<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Model{
	
	
	 function search(){
	 	session_start();
	 	$fname=$_SESSION['fname'];
	 	echo $fname;
		$query = $this->db->get('users');

			$fname = $data['fname'];

			$this->db->select('fname', 'lname');
			$this->db->where('fname',$data['fname']);
    		$query = $this->db->get('users');


    		$fname = $_SESSION['fname'];
			return $fname;
	}
}
?>