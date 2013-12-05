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
			$this->db->where('username',$username);
			$query=$this->db->get('users');
			foreach ($query->result_array() as $row){
			$_SESSION['fname']=$row['fname'];
			$_SESSION['lname']=$row['lname'];
			$_SESSION['target']=$row['Picture'];
		}
			return $username;
		}
// If the previous process did not validate
// then return false.
		return false;
	}

	public function addf(){
		$data['sender'] = $_GET['id1'];
		$data['reciever'] = $_GET['id2'];
		$data['status']="pending";
		$this->db->insert('friendlist', $data);
		return true;
	}

	public function imgup()
	{
		session_start();
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
				$fullname=$newname.".".$ext;
				$target="upload/images/";
				$fulltarget=$target.$fullname;

				$result = $_SESSION['result'];


				if(move_uploaded_file($_FILES['img']['tmp_name'], $fulltarget)) {

					echo "The file ".  basename( $_FILES['img']['name']). 
					" has been uploaded";
				}

				else{
					echo "There was an error uploading the file, please try again!";
				}
				echo $fulltarget;
				$_SESSION['target'] = $fulltarget;

				$hi=$_FILES['img']['name'];

				$this->db->where('username', $result);
				$this->db->set('Picture', $fulltarget);
				$this->db->update('users');



			
				


			}
		}
	}

	public function acceptinvite(){
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

		date_default_timezone_set('Asia/Karachi');
		$date = date('Y-m-d H:i:s');
		$data['usersId'] = $_SESSION['result'];
		$data['time'] = $date;
		$data['status'] = $_SESSION['status'];
		$data['type'] = "text";
		$data['privacy'] = $_SESSION['privacy'];

		$this->db->insert('newsfeed', $data);
		return true;
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

	public function getNewsFeed1(){

			

			$this->db->select('reciever');
			$this->db->from('friendlist');
			$this->db->where('sender', $_SESSION['result']);
			$this->db->where('status', "ok");
			
			$query=$this->db->get();
			$row = array();
			$row = $query->row_array();
			$j = 0;
			//$reciever = array();
			foreach ($query->result() as $row)
			{
				$reciever[$j] = $row->reciever;
				$j++;
			}
//			
			if($query->num_rows>0){
			$this->db->join('users', 'newsfeed.usersId = users.username');
			$this->db->where_in('newsfeed.usersId', $reciever);
			$this->db->or_where('newsfeed.usersId', $_SESSION['result']);
			$this->db->or_where('newsfeed.privacy', "public");
			$this->db->order_by('newsfeed.time', "desc");
			$q=$this->db->get('newsfeed');
		}
		else
		{
			$this->db->join('users', 'newsfeed.usersId = users.username');
			//$this->db->where_in('newsfeed.usersId', $reciever);
			$this->db->where('newsfeed.usersId', $_SESSION['result']);
			$this->db->or_where('newsfeed.privacy', "public");
			$this->db->order_by('newsfeed.time', "desc");
			$q=$this->db->get('newsfeed');
		}

				$row = array();
				$row = $q->row_array();
				$array = array();
				$i = 0;
				foreach ($q->result() as $row)
				{
					$array[$i]['ID'] = $row->ID;
					$array[$i]['time'] = $row->time;
					$array[$i]['status'] = $row->status;
					$array[$i]['privacy'] = $row->privacy;
					$array[$i]['usersId'] = $row->usersId;
					$array[$i]['type'] = $row->type;
					$array[$i]['fname'] = $row->fname;
					$array[$i]['lname'] = $row->lname;
					$array[$i]['Picture'] = $row->Picture;
					$i++;	
				}

			$_SESSION['statuses'] = $array;
	}

	

	public function comment(){
		date_default_timezone_set('Asia/Karachi');
		$date = date('Y-m-d H:i:s');
		$data['userid'] = $_SESSION['b'];
		$comments= $this->security->xss_clean($this->input->post('postComment'));
		$data['id'] = $_SESSION['a'];
		$data['time'] = $date;
		$data['comment'] = $comments;
		
		// return $fname;
		// echo $_SESSION['a'];
		// echo $_SESSION['b'];

		$this->db->insert('comments', $data);

		
		return true;
	}

	public function comment1()
	{
		$this->db->join('users', 'comments.userid = users.username');
		$this->db->order_by('comments.time', "desc");
		$query=$this->db->get('comments');

		$row = array();
				$row = $query->row_array();
				$array = array();
				$i = 0;
				foreach ($query->result() as $row)
				{
					$array[$i]['id'] = $row->id;
					$array[$i]['time'] = $row->time;
					$array[$i]['comment'] = $row->comment;
					
					$array[$i]['userid'] = $row->userid;
					$array[$i]['fname'] = $row->fname;
					$array[$i]['lname'] = $row->lname;
					$array[$i]['Picture'] = $row->Picture;
					$i++;	
				}

			$_SESSION['comment'] = $array;
	}

	public function getdata(){
		$this->db->where('username',$_SESSION['superusername']);
		$query=$this->db->get('users');
		foreach ($query->result_array() as $row){
		$_SESSION['fname1']=$row['fname'];
		$_SESSION['lname1']=$row['lname'];
		$_SESSION['target1']=$row['Picture'];
		}

		$this->db->where('sender', $_SESSION['hello']);
		$this->db->where('reciever',$_SESSION['superusername']);
		$this->db->or_where('reciever', $_SESSION['hello']);
		$this->db->where('sender',$_SESSION['superusername']);
		$query1 = $this->db->get('friendlist');
		$row = array();
		$row = $query1->row_array();
		$array = array();
		$i = 0;
		foreach ($query1->result() as $row){
		$array[$i]['send'] = $row->sender;
		$array[$i]['recieve'] = $row->reciever;
		$array[$i]['status'] = $row->status;
		$i++;
		}

		$_SESSION['frndship'] = $array;

	}

	public function notify(){

		$this->db->where('reciever',$_SESSION['result']);
		$this->db->where('status',"pending");
		$q=$this->db->get('friendlist');
		//$query = "Select * FROM friendlist WHERE reciever = '" .$_SESSION['result']."' AND status = 'pending'";
		$_SESSION['num']=$q->num_rows();
	}

	public function displayreq(){
			$this->db->select('sender');
			$this->db->from('friendlist');
			$this->db->where('reciever', $_SESSION['result']);
			$this->db->where('status', "pending");
			
			$query=$this->db->get();
			$row = array();
			$row = $query->row_array();
			$j = 0;
			//$reciever = array();
			foreach ($query->result() as $row)
			{
				$sender[$j]= $row->sender;
				$j++;
			}

			$this->db->where_in('username',$sender);
			$q=$this->db->get('users');

			$row = array();
			$row = $q->row_array();
			$array = array();
			$i = 0;
			foreach ($q->result() as $row)
				{
					// echo  $row->username;
					// echo $row->fname;
					// echo $row->lname;
					// echo $row->Picture;
					// $i++;	
					$array[$i]['username'] = $row->username;
					$array[$i]['fname'] = $row->fname;
					$array[$i]['lname'] = $row->lname;
					$array[$i]['Picture'] = $row->Picture;
					$i++;	
				}

			$_SESSION['disp'] = $array;

	}

}



?>