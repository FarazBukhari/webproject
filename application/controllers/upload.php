<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '30000';
		$config['max_width']  = '2500';
		$config['max_height']  = '2500';



		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('regpage3/regpage3', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$path = $data['upload_data']['file_name'];	
			$path = 'uploads/images/'.$path;
		}

		 $filename = $data['upload_data']['file_name'];
    	 $source_path = $data['upload_data']['full_path'];

    	 $target_path = $data['upload_data']['file_path'] . '/thumb/';
    	 $config_manip = array(
        'source_image' => $source_path,
        'new_image' => $target_path,
        'maintain_ratio' => TRUE,
        'create_thumb' => TRUE,
        'thumb_marker' => '',
        'width' => 60,
        'height' => 60
    );
    	$this->load->library('image_lib', $config_manip);
    	if (!$this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
   		 }
    // clear //
    $this->image_lib->clear();
    $thumb_path='uploads/images/thumb/'.$filename;

		$this->load->model('register_model');	
		$result = $this->register_model->register_user_details_image($path,$thumb_path);
		redirect('register/register/page1/registered','refresh');

	}
}
?>