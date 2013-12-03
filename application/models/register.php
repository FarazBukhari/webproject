<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Model{
	
	
	 function registration(){

		$query = $this->db->get('users');


	    	$data['fname'] = $this->security->xss_clean($this->input->post('firstName'));
			$data['lname'] = $this->security->xss_clean($this->input->post('lastName'));
	    	$data['username'] = $this->security->xss_clean($this->input->post('email'));
			$data['password'] = $this->security->xss_clean($this->input->post('password'));
			//$data['value']=true;

			$username = $this->security->xss_clean($this->input->post('email'));
			
			$this->db->select('username');
			$this->db->where('username',$data['username']);
    		$query = $this->db->get('users');

			

			if($query->num_rows() > 0)
			{
				return false;
			}
			else
			{
			$this->db->insert('users', $data);
			$userid = mysql_insert_id();
			$key = $data['username'] . date('mY');
			$key = md5($key);
			$email=$data['username'];
			$confirm = mysql_query("INSERT INTO `confirm` VALUES(NULL,'$userid','$key','$email')"); 
			if($confirm){
				$info ['username'] = $email;  
    			$info ['key'] = $key;
    			$info ['value'] = true;
    			$info ['username'] = $email;
    			return $info;
    			
			}  

			return $username;
		}

	}

function registration1(){

		$query = $this->db->get('users');


	    	$fname= $this->security->xss_clean($this->input->post('name'));
			return $fname;
		}

	
	function register_user_details_image($path = null)
	    {
	    	//include "upload_file.php";
	    	$username = $this->security->xss_clean($this->input->post('username'));
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username',$username);
    		$query = $this->db->get();
    		$row = $query->row_array();

			//$data['UserId']= $row['userid'];

			$image = $this->security->xss_clean($this->input->post('file'));
			$path= "'" . $path . "'";
			if($query->num_rows() == 1)
	    	{
	    		// echo $username;
	    		// echo $path;
	    		// echo $image;
	    		$sql = "UPDATE users ".
       					"SET Picture = $image ".
       					"WHERE username = $username" ;
	    		//$this->db->get('useradditionalinfo');
	    		//$this->db->set('Picture', $path, False);
	    		//$this->db->where('UserId', $data['UserId']);
    			//$this->db->update('useradditionalinfo');
    			//return $path;
	    	}
	    	else
	    		return false;
			
	    }
	}
?>