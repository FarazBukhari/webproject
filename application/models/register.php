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
			$fname= $this->security->xss_clean($this->input->post('firstName'));
			$lname = $this->security->xss_clean($this->input->post('lastName'));
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
			// $userid = mysql_insert_id();
			// $key = $data['username'] . date('mY');
			// $key = md5($key);
			// $email=$data['username'];
			// $confirm = mysql_query("INSERT INTO `confirm` VALUES(NULL,'$userid','$key','$email')"); 
			// if($confirm){
			// 	$info ['username'] = $email;  
   //  			$info ['key'] = $key;
   //  			$info ['value'] = true;
   //  			$info ['username'] = $email;
   //  			return $info;
    			
			//}  
			$_SESSION['fname']=$fname;
			$_SESSION['lname']=$lname;
			return $username;
		}

	}

function registration1(){

		$query = $this->db->get('users');


	    	$name= $this->security->xss_clean($this->input->post('name'));

	    	 if(preg_match('/\s/',$name) == 1){
	    	 	$words = explode(" ", $name);
            	$this->db->where('fname', $words[0]);
            	$this->db->where('lname', $words[1]);
            	$this->db->or_like('fname', $words[0]);
                $this->db->or_like('lname', $words[1]);
                $query = $this->db->get('users');

               
	    	 }

	    	else if(preg_match('/\s/',$name) == 0){
	    	$this->db->where('fname', $name);
            $this->db->or_where('lname', $name);
            $this->db->or_like('fname', $name);
            $this->db->or_like('lname', $name);

            // Run the query
            $query = $this->db->get('users');
	    	}

	    	$row = array();
			$row = $query->row_array();
			$array = array();
			$i = 0;
			foreach ($query->result() as $row)
			{
				$array[$i]['fname'] = $row->fname;
				$array[$i]['lname'] = $row->lname;
				$array[$i]['Picture'] = $row->Picture;
				$array[$i]['username']=$row->username;
				$i++;	
			}

			$_SESSION['srch'] = $array;
			//return $fname;
		}

	
	function register_user_details_image($path = null)
	    {
	    	include "upload_file.php";
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