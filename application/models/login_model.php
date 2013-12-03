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

				header("Location: echo base_url('index.php/login/login/after')";


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

		$table = 'users';
		$this->db->select('reciever');
		$this->db->where('sender',$_SESSION['result']);
		$this->db->where('status','ok');
		$query=$this->db->get('friendlist');
		$row = $query->row_array();
		$array = null; 
		foreach ($query->result() as $row)
		{
			$array[]=$row;


		}

		$json = json_encode($array);
		echo $json;
		$this->db->_reset_select();
		$this->db->select("*");
		$this->db->where_in('usersId',$json);
		$this->db->or_where('usersId',$_SESSION['result']);
		$this->db->or_where('privacy','public');
		$query = $this->db->get('newsfeed');
		echo $query->num_rows;
		return true;


	}
}



?>