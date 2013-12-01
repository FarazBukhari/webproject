<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function validate(){
		// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		
		// Prep the query
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		// Run the query
		$query = $this->db->get('users');
		// Let's check if there are any results
		if($query->num_rows == 1)
		{
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					//'userid' => $row->userid,
				'fname' => $row->fname,
				'lname' => $row->lname,
				'username' => $row->username,
				'validated' => true
				);
			$this->session->set_userdata($data);
			return $username;
		}
		// If the previous process did not validate
		// then return false.
		return false;
	}

	public function addf(){
		// echo $_GET['id1'];
		// echo $_GET['id2'];
		$data['sender'] = $_GET['id1'];
		$data['reciever'] = $_GET['id2'];
		$data['status']="pending";
		$this->db->insert('friendlist', $data);
		return true;
	}

	public function acceptinvite(){
		// echo $_GET['id1'];
		// echo $_GET['id2'];
		$data['sender'] = $_GET['id1'];
		$data['reciever'] = $_GET['id2'];
		$data['status']="ok";
		$this->db->insert('friendlist', $data);


		$varshabana = "ok";
		$this->db->where('sender', $_GET['id2']);
		$this->db->where('reciever', $_GET['id1']);
		$this->db->set('status', $varshabana);
		$this->db->update('friendlist');
		return true;
	}


	public function newsfeed(){
		// require('db.php');
		/**
		* Adding News for Demo request by applying check on addnews POST parameter
		**/
		date_default_timezone_set('Asia/Karachi');
		$date = date('Y-m-d H:i:s');
		$data['usersId'] = $_SESSION['result'];
		$data['time'] = $date;
		$data['status'] = $_SESSION['status'];
		$data['type'] = "text";
		$data['privacy'] = $_SESSION['privacy'];

		$this->db->insert('newsfeed', $data);
		return true;
		// if(isset($_POST['addnews'])){
		
		// 	$news = filter_input(INPUT_POST, 'news', FILTER_SANITIZE_SPECIAL_CHARS);
		// 	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		// 	$this->db->insert('newsfeed', $news);
		// 	$this->db->set('status', $news);
		// 	$this->db->set('time', $date);

		// 	$sql = "INSERT INTO newsfeed (description, name, date) VALUES ('".$news."', '".$name."', '".date('Y-m-d H:i:s')."')";
		// 	mysql_query($sql);
		// }
	}


	public function getImage($id){
		$this->db->where('usersId',$id);
		$i=$this->db->get('users');
		if($i->row)
		{
			$row=$i->row;
			return $row->fulltarget;




		}




	}


	public function getNewsFeed(){

		
	}

	public function getNewsFeed1(){

		//$this->db->get('reciever');

		//echo $safe_tag;//debugging
		$table = 'users';
     	//$this->db->get('');
        // $this->db->join('friendlist', 'users.username = friendlist.sender');
        // $this->db->join('newsfeed', 'friendlist.sender = newsfeed.usersId');
        // $this->db->where('friendlist.sender', $_SESSION['result']);
		$this->db->select('reciever');
		//$this->db->from('friendlist');
		$this->db->where('sender',$_SESSION['result']);
		$this->db->where('status','ok');
		//$subQuery = $this->db->_compile_select();
		$query=$this->db->get('friendlist');
		$row = $query->row_array();
		$array = null; 
		foreach ($query->result() as $row)
		{
			$array[]=$row;
			
			
		}

		$json = json_encode($array);
		echo $json;
		// $this->db->from('friendlist');
  //       $this->db->where('sender',$_SESSION['result']);
  //       $this->db->where('status','ok');
  		 //$f=$this->db->get('friendlist');
  		// echo $f->num_rows;


		$this->db->_reset_select();
        //$name= array('fahim@hot.com');
		$this->db->select("*");
		$this->db->where_in('usersId',$json);
		$this->db->or_where('usersId',$_SESSION['result']);
		$this->db->or_where('privacy','public');
		//$this->db->get('myTable');
  //       $this->db->where('usersId',$_SESSION['result']);
  //       $this->db->or_where('privacy','public');
  // //       $sub = $this->subquery->start_subquery('where_in');
		// // $sub->SELECT('reciever')->FROM('friendlist');
		// // $this->subquery->end_subquery('usersId', true);
		$query = $this->db->get('newsfeed');
		echo $query->num_rows;
		return true;
        //while ($row = $query->result_array()){
        	//echo $row['fname'];
    	//}

		// $query='Select username, sender, reciever, usersId, status FROM users JOIN friendlist ON username = sender JOIN newsfeed ON sender = usersId
		// where username = '.$userid.' AND status = "ok"';

		// $result=$this->db->query($query);
		// return $result;

	}
}



?>